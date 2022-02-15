<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSystemWeigth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_weigth', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipe');
            $table->integer('kk');
            $table->integer('ruangan');
            $table->integer('lantai');
            $table->integer('fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_system_weigth');
    }
}
