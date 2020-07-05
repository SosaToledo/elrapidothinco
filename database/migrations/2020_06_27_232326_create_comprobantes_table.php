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
            $table->id("id");
            $table->string("id_simple_comprobante");

            $table->unsignedBigInteger("id_camioneros");
            $table->foreign("id_camioneros")->references("id")->on("camioneros");
            
            $table->unsignedBigInteger("id_viaje")->nullable();
            $table->foreign("id_viaje")->references("id")->on("viajes");
            
            $table->string("fecha");
            $table->string("detalles");
            $table->string("tipo");
            $table->float('monto', 10,2);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
