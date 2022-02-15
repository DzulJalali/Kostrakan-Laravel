<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuildingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_details', function(Blueprint $table)
        {
            $table->id('building_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tipe_id')->unsigned();
            $table->bigInteger('kk_id')->unsigned();
            $table->string('alamat');
            $table->date('published_date');
            $table->string('status');
            $table->string('jmlh_ruangan');
            $table->string('luas_bangunan');
            $table->string('jmlh_lantai');
            $table->string('keterangan_fasilitas');
            $table->string('harga');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
            $table->string('gambar4');

        });

        Schema::table('building_details', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('building_details', function (Blueprint $table) {
            $table->foreign('tipe_id')->references('tipe_id')->on('building_types')->onUpdate('cascade')
            ->onDelete('cascade');
        });


        Schema::table('building_details', function (Blueprint $table) {
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
        Schema::dropIfExist('detail_bangunan');
    }
}
