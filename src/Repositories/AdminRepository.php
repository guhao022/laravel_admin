<?php
namespace Modules\Admin\Repositories;

use Modules\Admin\Facades\Avatar;
use Modules\Admin\Models\AdminUser;
use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Notifications\PermissionNotification;
use Illuminate\Support\Facades\Hash;

class AdminRepository
{
    public function createAdminAndSaveRole($request)
    {
        $admin = new AdminUser();

        $admin->email = $request->email;

        $admin->name = $request->name;

        $admin->password = bcrypt($request->password);

        $admin->avatar = "";

        // 生成头像
        $path = storage_path("app/public/avatar");

        $avatar = str_random(22) . ".png";

        if (Avatar::create($admin->name)->save($path, $avatar)) {
            $admin->avatar = "/" . $path . "/" . $avatar;
        }

        $admin->save();

        if(is_array($request->role_ids) && count($request->role_ids) > 0){

            $roles = AdminRoles::whereIn('id',$request->role_ids)->get();

            $admin->attachRoles($roles);
        }
    }

    public function updateAdminAndRole($request,$id)
    {
        $admin = AdminUser::find($id);

        //$admin->email = $request->email;

        $admin->name = $request->name;

        //1.有密码通过验证，修改密码
        if(strlen($request->password) > 0){

            $admin->password = bcrypt($request->password);

        }

        if ($request->hasFile('avatar')) {

            $extension = $request->avatar->extension();

            $filename = str_random(22) . "." . $extension;

            $request->avatar->storeAs("avatar", $filename);

            $admin->avatar = $filename;

        };

        $admin->save();

        //2.修改角色
        if(!is_array($request->role_ids) || count($request->role_ids) <=0 ){

            $admin->detachRoles($admin->roles);

        }else{

            $newRoles = AdminRoles::whereIn('id',$request->role_ids)->get();

            $newRoleIds = [];

            $needNotify = false;

            foreach($newRoles as $role){

                if(!$admin->hasRole($role->name)){

                    $needNotify = true;

                    $admin->attachRole($role);

                }

                array_push($newRoleIds,$role->id);
            }

            $hasRoleIds = [];

            foreach($admin->roles as $adminRole){

                array_push($hasRoleIds,$adminRole->id);
            }


            foreach($hasRoleIds as $hasRoleId){
                if(!in_array($hasRoleId,$newRoleIds)){
                    $needNotify = true;
                    $admin->roles()->detach($hasRoleId);
                }
            }
            if($needNotify){
                $admin->notify(new PermissionNotification($newRoles));
            }
        }
        return $admin;
    }

    public function changePassword($request, $id) {
        $admin = AdminUser::find($id);

        $admin->password = bcrypt($request->password);

        $admin->save();

    }

    public function resetPassword($request)
    {
        $admin = auth()->guard('admin')->user();

        if(strlen($request->old_password) > 0 && strlen($request->password) > 0){

            if(Hash::check($request->old_password, $admin->password)){

                $admin->password = bcrypt($request->password);

                return $admin->save();

            }else{

                return false;

            }
        }
        return true;
    }
}