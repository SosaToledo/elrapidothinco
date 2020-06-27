<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id("id_comprobantes");
            $table->string("id_simple_comprobante");

            $table->unsignedBigInteger("id_camioneros");
            $table->foreign("id_camioneros")->references("id_camioneros")->on("camioneros");
            
            $table->unsignedBigInteger("id_viaje");
            $table->foreign("id_viaje")->references("id_viajes")->on("viajes");
            
            $table->string("detalles");
            $table->string("tipo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobantes');
    }
}
