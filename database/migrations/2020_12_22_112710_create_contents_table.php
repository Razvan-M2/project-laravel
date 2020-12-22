<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('date');
            $table->unsignedBigInteger('id_category');
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rating');
            $table->string('stamp')->nullable();
            $table->tinyInteger('validated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
