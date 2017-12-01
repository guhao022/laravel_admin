<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialiteAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialite_auth', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->nullable()->comment('用户ID');
            $table->string('identification')->nullable()->comment('标识');
            $table->string('type')->comment('登录类型,qq、微信、微博等');
            $table->string('state')->comment('状态码');
            $table->text('extra')->nullable()->comment('额外信息');
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
        Schema::dropIfExists('socialite_auth');
    }
}
