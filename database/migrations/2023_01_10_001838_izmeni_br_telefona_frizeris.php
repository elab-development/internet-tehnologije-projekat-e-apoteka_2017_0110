<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmeniBrTelefonaFrizeris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frizeris', function (Blueprint $table) {
            $table->renameColumn('brTelefona', 'broj_telefona');
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
            $table->renameColumn('broj_telefona', 'brTelefona');
        });
    }
}