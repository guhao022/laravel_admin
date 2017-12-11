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
        factory('Modules\Admin\Models\AdminUser', 1)->create([
            'id'=>1,
            'name'=>'admin',
            'password' => bcrypt('123456')
        ]);
    }
}
