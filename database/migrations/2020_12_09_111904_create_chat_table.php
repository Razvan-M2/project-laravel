<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chat')) {
            Schema::create('chat', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->unsignedBigInteger('id_user');
                // $table->foreign('id-user')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('id_category');
                // $table->foreign('id-category')->references('id')->on('categories')->onDelete('cascade');
                $table->unsignedBigInteger('id_message');
                $table->tinyInteger('type');
                $table->text('content');
                $table->tinyInteger('verified');
                $table->text('stamp')->nullable();
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
        Schema::dropIfExists('chat');
    }
}
