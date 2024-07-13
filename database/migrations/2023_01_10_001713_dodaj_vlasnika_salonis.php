<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DodajVlasnikaSalonis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salonis', function (Blueprint $table) {
            $table->after('naziv', function ($table) {
                $table->string('vlasnik');
            });
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
            $table->dropColumn('vlasnik');
        });
    }
}