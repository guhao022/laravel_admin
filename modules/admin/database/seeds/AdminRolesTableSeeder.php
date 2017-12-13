<?php

namespace Modules\Admin\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_roles')->insert([
            'id'=>1,
            'name'=>'admin',
            'display_name'=>'系统管理员',
        ]);

        DB::table('admin_role_user')->insert([
            'user_id'=>1,
            'roles_id'=>1,
        ]);
    }
}
