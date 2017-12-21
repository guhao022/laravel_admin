<?php
/**
 * Created by PhpStorm.
 * User: 95
 * Date: 2017/10/27
 * Time: 11:08
 */

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\AdminPermissions;

class PermissionRepository
{
    public function createPermission($request)
    {
        $permission = new AdminPermissions();

        $permission->name = $request->name;

        $permission->display_name = $request->display_name;

        $permission->group_name = $request->group_name;

        $permission->icon = $request->icon;

        $permission->pid = $request->pid;

        $permission->description = $request->description;

        if ($permission->save()) {
            return true;
        } else {
            return false;
        }

    }

    public function getPermissionInfo($id)
    {
        $permission = AdminPermissions::find($id);

        $top_permission = AdminPermissions::where("pid", "0")->get();

        return ['permission'=>$permission,'top_menu'=>$top_permission];
    }

    public function updatePermissionInfo($request,$id)
    {
        $permission = AdminPermissions::find($id);


        $permission->display_name = $request->display_name;

        $permission->group_name = $request->group_name;

        $permission->icon = $request->icon;

        $permission->is_menu = $request->is_menu;

        $permission->pid = $request->pid;

        $permission->description = $request->description;

        if($permission->save()){
            return true;
        }else{
            return false;
        }
    }

    public function tree($table,$p_id='0') {
        $tree = array();
        foreach($table as $row){
            if($row['pid']==$p_id){
                $tmp = $this->tree($table,$row['id']);
                if($tmp){
                    $row['children']=$tmp;
                }else{
                    $row['leaf'] = true;
                }
                $tree[]=$row;
            }
        }
        return $tree;
    }
}