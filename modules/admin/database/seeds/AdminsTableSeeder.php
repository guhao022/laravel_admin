<?php

namespace Modules\Admin\Seeds;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
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
            'name'=>'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
