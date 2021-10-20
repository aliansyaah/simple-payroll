<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFkToRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            /* Modify column user_id to user_id UNSIGNED */
            // Method 1: You have to add the doctrine/dbal dependency to your composer.json file
            // $table->integer('user_id')->unsigned()->change();

            // Method 2
            DB::statement("ALTER TABLE `role_user` CHANGE COLUMN `user_id` `user_id` BIGINT(20) UNSIGNED ");

            $table->foreign('user_id', 'role_user_fk0')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id', 'role_user_fk1')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            // $table->integer('user_id')->change();
            
            $table->dropForeign('role_user_fk0');
            $table->dropForeign('role_user_fk1');
            // DB::statement("ALTER TABLE `role_user` CHANGE COLUMN `user_id` `user_id` BIGINT(20)");
        });
    }
}
