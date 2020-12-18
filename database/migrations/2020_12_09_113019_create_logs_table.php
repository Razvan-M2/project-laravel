<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('logs')) {
            Schema::create('logs', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->unsignedBigInteger('id-utilizator');
                // $table->foreign('id-utilizator')->references('id')->on('users')->onDelete('cascade');
                $table->string('action');
                $table->unsignedBigInteger('id-content');
                // $table->foreign('id-content')->references('id')->on('content')->onDelete('cascade');
                $table->unsignedBigInteger('id-message');
                // $table->foreign('id-message')->references('id')->on('chat')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
