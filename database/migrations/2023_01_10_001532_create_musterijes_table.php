<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusterijesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musterijes', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->string('prezime');
            $table->string('broj_telefona');
            $table->string('email');
            $table->foreignId('frizer_id')->constrained('frizeris');
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
        Schema::dropIfExists('musterijes');
    }
}