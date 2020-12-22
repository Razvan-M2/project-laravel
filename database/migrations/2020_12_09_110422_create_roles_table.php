<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string("role_name");
                $table->timestamps();
            });
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
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
