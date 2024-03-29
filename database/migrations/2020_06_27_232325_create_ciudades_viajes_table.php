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
            $table->id();

            $table->unsignedBigInteger("id_ciudad");
            $table->foreign('id_ciudad')->references('id')->on('ciudades');

            $table->unsignedBigInteger("id_viajes");
            $table->foreign('id_viajes')->references('id')->on('viajes');
            
            $table->timestamps();

            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
