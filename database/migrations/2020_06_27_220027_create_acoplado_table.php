<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcopladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoplado', function (Blueprint $table) {
            $table->id("id_acoplado");
            $table->string("id_simple_acoplado");
            $table->string("patente", 10);
            $table->date("vtv_vencimiento", 0);
            $table->date("senasa_vencimiento", 0);
            $table->date("seguro_vencimiento", 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acoplado');
    }
}
