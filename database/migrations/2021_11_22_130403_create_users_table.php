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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->bigInteger('owner_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('no_hp')->nullable();
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->string('username')->nullable();
            $table->string('password');
            $table->boolean('role')->default(0);
            $table->string('status')->default('pencari');
            $table->string('profile_image')->default('default.jpg');
            // $table->string('profile_picture');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('owner_id')->references('owner_id')->on('owners')->onUpdate('cascade')
            ->onDelete('cascade');
        });

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
