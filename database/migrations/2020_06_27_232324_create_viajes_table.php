<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //-------------- ACLARACIÓN IMPORTANTE -----------------------------------------------------------
        //Durante un migrate refresh me generaba el problema que no borraba correctamente la tabla viajes, 
        //por lo que despues de hacer un rollback tuve que borrarla manualmente desde la BD o desde Tinker
        
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger("id_camiones");
            $table->foreign("id_camiones")->references("id")->on("camiones");

            $table->unsignedBigInteger("id_acoplado")->nullable();
            $table->foreign('id_acoplado')->references('id')->on('acoplado');

            $table->unsignedBigInteger("id_camionero");
            $table->foreign('id_camionero')->references('id')->on('camioneros');

            $table->unsignedBigInteger("id_cliente");
            $table->foreign('id_cliente')->references('id')->on('clientes');

            $table->string("idSimpleViaje");  //identificador interno VI000
            $table->float("km_inicial")->nullable();
            $table->float("km_final")->nullable();
            $table->float("distancia")->nullable(); //kmfinal-kminicial

            $table->unsignedBigInteger("origen");
            $table->foreign('origen')->references('id')->on('ciudades');

            //destinos no lo ponemos aca, va en la tabla de muchos a muchos
            $table->float("valor");
            $table->float("ganancia_camionero"); //el 18% que se lleva el camionero del valor de viaje
            $table->string("tipoCamion"); //es para definir si el camion va con acoplado solo o lleva chasis tipo de valor esperado [CHASIS/ACOPLADO]
            $table->date("fecha");
            $table->float("peajes")->nullable(); //Gastos de peajes en el viaje + puertos + etc, todo gasto tiene que ir junto con un comprobante 
            $table->float("gasoil_litros")->nullable(); //cantidad de litros gastados en el viaje.
            $table->float("gasoil_precio")->nullable(); //gasto de gasoil promedio
            $table->integer("notaViaje")->nullable(); //usado en el sistema viejo, pasará a desuso.
            $table->integer("guia"); //numero de talonario guia que se entrega al chofer
            
            //LOS VALORES QUE ACEPTAN NULOS SON PORQUE SE TIENEN QUE COMPLETAR EN OTRO MOMENTO (AL TERMINAR EL VIAJE)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
