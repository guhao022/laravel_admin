<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->comment("登录邮箱");
            $table->string('password')->comment("密码");
            $table->string('name')->nullable()->comment("用户名称");
            $table->string('avatar')->nullable()->comment("头像");
            $table->timestamp('last_login')->nullable()->comment("最后登录时间");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
