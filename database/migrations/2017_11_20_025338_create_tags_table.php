<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment("标签名称");
            $table->string('image')->comment("标签图片");
            $table->string('description')->nullable()->comment("标签简介");
            $table->boolean('active')->default(1)->comment("是否启用");
            $table->integer('sort')->default(0)->comment("排序");
            $table->integer('joke_num')->default(0)->comment("笑话数");
            $table->string('seo_title')->nullable()->comment("seo_title");
            $table->string('seo_keywords')->nullable()->comment("seo_keywords");
            $table->string('seo_description')->nullable()->comment("seo_description");
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
        Schema::dropIfExists('tags');
    }
}
