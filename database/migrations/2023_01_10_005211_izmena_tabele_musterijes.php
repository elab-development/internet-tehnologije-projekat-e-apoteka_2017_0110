<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmenaTabeleMusterijes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('musterijes', function (Blueprint $table) {
            Schema::rename('musterijes', 'musterijas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('musterijes', function (Blueprint $table) {
            Schema::rename('musterijas', 'musterijes');
        });
    }
}
