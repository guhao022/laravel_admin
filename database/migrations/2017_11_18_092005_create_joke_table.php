<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJokeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joke', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->comment("笑话标题");
            $table->integer("cat_id")->nullable()->comment("分类ID");
            $table->string('image')->nullable()->comment("图片");
            $table->text('content')->comment("内容");
            $table->integer("uid")->comment("发表人");
            $table->tinyInteger("recommend")->default(0)->comment("推荐");
            $table->integer("view_num")->default(0)->comment("浏览量");
            $table->integer("comment_num")->default(0)->comment("评论量");
            $table->integer("like_num")->default(0)->comment("喜欢数量");
            $table->integer("dislike_num")->default(0)->comment("不喜欢数量");
            $table->integer("share_num")->default(0)->comment("转发量");
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
        Schema::dropIfExists('joke');
    }
}
