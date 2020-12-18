<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('history')) {
            Schema::create('history', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('z_id');
                $table->date('date');
                $table->unsignedBigInteger('id-category');
                // $table->foreign('id-category')->references('id')->on('categories')->onDelete('cascade');
                $table->string('title');
                $table->text('description',);
                $table->unsignedBigInteger('id-user-modified');
                // $table->foreign('id-user-modified')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('id-rating');
                // $table->foreign('id-rating')->references('id')->on('ratings');
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
        Schema::dropIfExists('history');
    }
}
