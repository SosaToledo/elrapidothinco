<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamionerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camioneros', function (Blueprint $table) {
            $table->id("id_camioneros");
            $table->string("id_simple_camioneros");
            $table->bigInteger("DNI");
            $table->bigInteger("telefono");
            $table->string("nombre");
            $table->string("apellido");
            $table->string("direccion");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camioneros');
    }
}
