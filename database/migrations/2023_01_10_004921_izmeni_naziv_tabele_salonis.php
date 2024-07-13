<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IzmeniNazivTabeleSalonis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salonis', function (Blueprint $table) {
            Schema::rename('salonis', 'salons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salonis', function (Blueprint $table) {
            Schema::rename('salons', 'salonis');
        });
    }
}