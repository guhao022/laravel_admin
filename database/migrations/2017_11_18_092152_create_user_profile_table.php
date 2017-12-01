<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment("用户ID");
            $table->tinyInteger('gender')->default(0)->comment("性别，1-男2-女");
            $table->string("avatar")->nullable()->comment("用户头像");
            $table->date("birthday")->nullable()->comment("生日");
            $table->ipAddress("register_ip")->nullable()->comment("注册IP");
            $table->ipAddress("last_login_ip")->nullable()->comment("最后登录IP");
            $table->timestamp("last_login_time")->nullable()->comment("最后登录时间");
            $table->integer("online_time")->default(0)->comment("在线时长");
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
        Schema::dropIfExists('user_profile');
    }
}
