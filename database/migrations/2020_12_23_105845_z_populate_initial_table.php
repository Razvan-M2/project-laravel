<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZPopulateInitialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('roles')->insert(
            array(
                'id' => 1,
                'role_name' => 'admin',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 2,
                'role_name' => 'user',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 3,
                'role_name' => 'professor',
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'user_name' => 'admin',
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'nu4/56f69h0j9k@asfd',
                'id_role' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
