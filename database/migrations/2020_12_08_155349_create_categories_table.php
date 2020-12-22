<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->timestamps();
        });
        DB::table('categories')->insert(
            array(
                'category_name' => 'debugging',
            )
        );
        DB::table('categories')->insert(
            array(
                'category_name' => 'optimization',
            )
        );
        DB::table('categories')->insert(
            array(
                'category_name' => 'spagheti code',
            )
        );        
        DB::table('categories')->insert(
            array(
                'category_name' => 'web development',
            )
        );
        DB::table('categories')->insert(
            array(
                'category_name' => 'algorithms',
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
        Schema::dropIfExists('categories');
    }
}
