<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFilteringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_filtering', function (Blueprint $table) {
            $table->id('cf_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tipe_id')->unsigned();
            $table->bigInteger('kk_id')->unsigned();
            $table->string('keterangan_fasilitas');
        });

        Schema::table('content_filtering', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('content_filtering', function (Blueprint $table) {
            $table->foreign('tipe_id')->references('tipe_id')->on('building_types')->onUpdate('cascade')
            ->onDelete('cascade');
        });


        Schema::table('content_filtering', function (Blueprint $table) {
            $table->foreign('kk_id')->references('kk_id')->on('cities')->onUpdate('cascade')
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
        Schema::dropIfExists('content_filtering');
    }
}
