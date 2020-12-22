<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('user_name');
                $table->string('first_name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->text('profile_photo_path')->nullable();
                $table->unsignedBigInteger('id_role')->default(2);
                $table->boolean('is_activ')->nullable();
                $table->timestamps();
            });
            // DB::table('users')->insert(
            //     array(
            //         'name' => 'admin',
            //         'user_name' => 'admin',
            //         'first_name' => 'admin',
            //         'email' => 'admin@gmail.com',
            //         'password' => 'nu4/56f69h0j9k@asfd',
            //         'id_role' => 1
            //     )
            // );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
