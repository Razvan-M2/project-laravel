<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZApplyForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('contents', function (Blueprint $table) {
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_rating')->references('id')->on('ratings')->onDelete('cascade');
        });
        Schema::table('chat', function (Blueprint $table) {
            $table->foreign('id_content')->references('id')->on('contents')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });

        // Schema::table('history', function (Blueprint $table) {
        //     $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
        //     $table->foreign('id_user_modified')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('id_rating')->references('id')->on('ratings')->onDelete('cascade');
        // });
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
