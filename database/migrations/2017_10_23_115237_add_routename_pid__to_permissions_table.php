<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoutenamePidToPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_permissions', function (Blueprint $table) {
            //
            $table->string('icon')->nullable();
            $table->boolean('is_menu')->default(0)->comment("是否显示菜单");
            $table->boolean('active')->default(1)->comment('是否激活');
            $table->string('group_name')->nullable()->comment("组名");
            $table->integer('pid')->nullable()->comment("父ID");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_permissions', function (Blueprint $table) {
            //
        });
    }
}
