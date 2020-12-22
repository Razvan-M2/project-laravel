<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('log-errors')) {
            Schema::create('log-errors', function (Blueprint $table) {
                $table->id();
                $table->text('message');
                $table->string('request-parameter');
                $table->string('query');
                $table->text('stacktrace');
                $table->string('level');
                $table->string('data');
                $table->timestamps();
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
        Schema::dropIfExists('log-errors');
    }
}
