<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrizerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frizeris', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->string('prezime');
            $table->integer('godRođenja');
            $table->string('brTelefona');
            $table->foreignId('salon_id')->constrained('salonis');
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
        Schema::dropIfExists('frizeris');
    }
}
