<?php

namespace Modules\Admin\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_user')->insert([
            'username' => "admin",
            'password' => bcrypt("123456"),
            'name' => '门前大桥下 ヾ',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
    }
}
