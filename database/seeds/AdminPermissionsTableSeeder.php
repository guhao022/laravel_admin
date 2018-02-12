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
                'is_menu' => '1',
                'group_name'=>'',
                'pid'=>0
            ],
            [
                'id'=>2,
                'name'=>'admin.index',
                'display_name'=>'用户管理',
                'icon' => '',
                'is_menu' => '1',
                'group_name'=>'admin',
                'pid'=>1
            ],
            [
                'id'=>3,
                'name'=>'admin.create',
                'display_name'=>'创建用户',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'admin',
                'pid'=>2
            ],
            [
                'id'=>4,
                'name'=>'admin.show',
                'display_name'=>'显示用户信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'admin',
                'pid'=>2
            ],
            [
                'id'=>5,
                'name'=>'admin.update',
                'display_name'=>'保存用户信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'admin',
                'pid'=>2
            ],
            [
                'id'=>6,
                'name'=>'admin.reset',
                'display_name'=>'重置密码',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'admin',
                'pid'=>2
            ],
            [
                'id'=>7,
                'name'=>'role.index',
                'display_name'=>'角色管理',
                'icon' => '',
                'is_menu' => '1',
                'group_name'=>'role',
                'pid'=>1
            ],
            [
                'id'=>8,
                'name'=>'role.create',
                'display_name'=>'创建角色',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'role',
                'pid'=>7
            ],
            [
                'id'=>9,
                'name'=>'role.show',
                'display_name'=>'显示角色信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'role',
                'pid'=>7
            ],
            [
                'id'=>10,
                'name'=>'role.update',
                'display_name'=>'保存角色信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'role',
                'pid'=>7
            ],
            [
                'id'=>11,
                'name'=>'role.destroy',
                'display_name'=>'删除角色',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'role',
                'pid'=>7
            ],
            [
                'id'=>12,
                'name'=>'permission.index',
                'display_name'=>'权限管理',
                'icon' => '',
                'is_menu' => '1',
                'group_name'=>'permission',
                'pid'=>1
            ],
            [
                'id'=>13,
                'name'=>'permission.create',
                'display_name'=>'创建权限',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'permission',
                'pid'=>12
            ],
            [
                'id'=>14,
                'name'=>'permission.show',
                'display_name'=>'显示权限信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'permission',
                'pid'=>12
            ],
            [
                'id'=>15,
                'name'=>'permission.update',
                'display_name'=>'保存权限信息',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'permission',
                'pid'=>12
            ],
            [
                'id'=>16,
                'name'=>'permission.destroy',
                'display_name'=>'删除权限',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'permission',
                'pid'=>12
            ],
            [
                'id'=>17,
                'name'=>'permission.child',
                'display_name'=>'子权限列表',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'permission',
                'pid'=>12
            ],
            [
                'id'=>18,
                'name'=>'my',
                'display_name'=>'个人管理',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'my',
                'pid'=>0
            ],
            [
                'id'=>19,
                'name'=>'notification.show',
                'display_name'=>'阅读通知',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'my',
                'pid'=>18
            ],
            [
                'id'=>20,
                'name'=>'my.profile',
                'display_name'=>'个人设置',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'my',
                'pid'=>18
            ],
            [
                'id'=>21,
                'name'=>'my.reset',
                'display_name'=>'修改密码',
                'icon' => '',
                'is_menu' => '0',
                'group_name'=>'my',
                'pid'=>18
            ],
        ];

        foreach($permissions as $permission){
            DB::table('admin_permissions')->insert([
                'id'=>$permission['id'],
                'name'=>$permission['name'],
                'display_name'=>$permission['display_name'],
                'icon'=>$permission['icon'],
                'is_menu'=>$permission['is_menu'],
                'group_name'=>$permission['group_name'],
                'pid'=>$permission['pid']
            ]);
        }

    }
}
