<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadesViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades_viajes', function (Blueprint $table) {
            $table->id("id_ciudades_viajes");

            $table->unsignedBigInteger("id_ciudad");
            $table->foreign('id_ciudad')->references('id')->on('ciudades');

            $table->unsignedBigInteger("id_viajes");
            $table->foreign('id_viajes')->references('id')->on('viajes');
            
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
        Schema::dropIfExists('ciudades_viajes');
    }
}
