<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content_filtering', function (Blueprint $table) {
            $table->string('jmlh_ruangan')->after('kk_id');
            $table->string('jmlh_lantai')->after('jmlh_ruangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content_filtering', function (Blueprint $table) {
            $table->dropColumn('jmlh_ruangan');
            $table->dropColumn('jmlh_lantai');
        });
    }
}
