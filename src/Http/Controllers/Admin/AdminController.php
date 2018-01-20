<?php

namespace Modules\Admin\Controllers\Admin;

use Modules\Admin\Controllers\Controller;
use Modules\Admin\Models\AdminUser;
use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Requests\ProfileUpdateRequest;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Validation\Admin\Create;
use Modules\Admin\Validation\Admin\Update;

class AdminController extends Controller
{
    protected $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {

        $admins = AdminUser::all();

        return admin_view('user.index',['admins'=>$admins]);
    }

    public function create()
    {
        $roles = AdminRoles::all();

        return admin_view('user.create', ['roles' => $roles]);
    }

    public function store(Create $request)
    {

        $this->admin->createAdminAndSaveRole($request);

        return redirect(route('admin.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = AdminUser::find($id);

        $roles = AdminRoles::all(['id','name','display_name']);

        return admin_view('user.edit', ['admin'=>$admin,'roles'=>$roles]);

    }

    public function update(Update $request, $id)
    {

        $admin = $this->admin->updateAdminAndRole($request,$id);

        return redirect(route('admin.index'))->with('message', '编辑用户: '.$admin->name.' 成功');
    }

    public function destroy($id)
    {
        $delete =  AdminUser::find($id)->delete();

        if ($delete) {
            return response()->json(['status'=>true, 'message'=>'删除成功']);
        } else {
            return response()->json(['status'=>false, 'message'=>'删除失败']);
        }

    }

    public function profile()
    {
        return admin_view('user.edit');
    }

    public function resetPassword()
    {
        return admin_view('user.reset');
    }

    public function resetUpdate(ProfileUpdateRequest $request)
    {

        if($this->admin->resetPassword($request)) {
            return redirect()->back()->with('message', '修改账户信息成功');
        }
        return redirect()->back()->with('message', '修改账户信息失败，原密码错误');
    }
}
