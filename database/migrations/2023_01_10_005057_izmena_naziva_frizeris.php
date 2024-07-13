<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmenaNazivaFrizeris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frizeris', function (Blueprint $table) {
            Schema::rename('frizeris', 'frizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frizeris', function (Blueprint $table) {
            Schema::rename('frizers', 'frizeris');
        });
    }
}