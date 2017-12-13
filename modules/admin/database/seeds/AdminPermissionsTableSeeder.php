<?php

namespace Modules\Admin\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            [
                'id'=>1,
                'name'=>'system',
                'display_name'=>'系统管理',
                'icon' => 'fa-cogs',
                'group_name'=>'',
                'fid'=>0
            ],
            [
                'id'=>2,
                'name'=>'admin.index',
                'display_name'=>'用户列表',
                'icon' => '',
                'group_name'=>'admin',
                'fid'=>1
            ],
            [
                'id'=>3,
                'name'=>'admin.store',
                'display_name'=>'创建用户',
                'icon' => '',
                'group_name'=>'admin',
                'fid'=>1
            ],
            [
                'id'=>4,
                'name'=>'admin.update',
                'display_name'=>'编辑用户',
                'icon' => '',
                'group_name'=>'admin',
                'fid'=>1
            ],
            [
                'id'=>5,
                'name'=>'role.index',
                'display_name'=>'角色列表',
                'icon' => '',
                'group_name'=>'role',
                'fid'=>1
            ],
            [
                'id'=>6,
                'name'=>'role.store',
                'display_name'=>'创建角色',
                'icon' => '',
                'group_name'=>'role',
                'fid'=>1
            ],
            [
                'id'=>7,
                'name'=>'role.update',
                'display_name'=>'编辑角色',
                'icon' => '',
                'group_name'=>'role',
                'fid'=>1
            ],
            [
                'id'=>8,
                'name'=>'role.destroy',
                'display_name'=>'删除角色',
                'icon' => '',
                'group_name'=>'role',
                'fid'=>1
            ],
            [
                'id'=>9,
                'name'=>'permission.index',
                'display_name'=>'权限列表',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>10,
                'name'=>'permission.store',
                'display_name'=>'创建权限',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>11,
                'name'=>'permission.update',
                'display_name'=>'编辑权限',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>12,
                'name'=>'permission.destroy',
                'display_name'=>'删除权限',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>13,
                'name'=>'permission.child',
                'display_name'=>'子权限列表',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>14,
                'name'=>'admin.profile',
                'display_name'=>'账户管理',
                'icon' => '',
                'group_name'=>'admin.profile',
                'fid'=>1
            ],
            [
                'id'=>15,
                'name'=>'notification.show',
                'display_name'=>'阅读通知',
                'icon' => '',
                'group_name'=>'notification',
                'fid'=>1
            ],
            [
                'id'=>16,
                'name'=>'admin.edit',
                'display_name'=>'显示用户信息',
                'icon' => '',
                'group_name'=>'admin',
                'fid'=>1
            ],
            [
                'id'=>17,
                'name'=>'permission.edit',
                'display_name'=>'显示权限',
                'icon' => '',
                'group_name'=>'permission',
                'fid'=>1
            ],
            [
                'id'=>18,
                'name'=>'role.edit',
                'display_name'=>'显示角色',
                'icon' => '',
                'group_name'=>'role',
                'fid'=>1
            ],
        ];

        foreach($permissions as $permission){
            DB::table('admin_permissions')->insert([
                'id'=>$permission['id'],
                'name'=>$permission['name'],
                'display_name'=>$permission['display_name'],
                'icon'=>$permission['icon'],
                'group_name'=>$permission['group_name'],
                'fid'=>$permission['fid']
            ]);
        }

    }
}
