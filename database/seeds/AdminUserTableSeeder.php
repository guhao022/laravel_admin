<?php

namespace Modules\Admin\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_user')->insert([
            'id'=>1,
            'email'=>'admin@admin.com',
            'password' => bcrypt('123456'),
            'name' => '萨满',
        ]);
    }
}
