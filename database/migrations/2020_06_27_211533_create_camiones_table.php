<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCamionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camiones', function (Blueprint $table) {
            $table->id();
            $table->string("id_simple_camiones");
            $table->string("patente", 10);
            $table->date("vtv_vencimiento", 0);
            $table->date("senasa_vencimiento", 0);
            $table->date("seguro_vencimiento", 0);

            //Se agregan mas campos en una nueva migrate, sacado desde este enlace de stackoverflow
            //https://stackoverflow.com/questions/39934276/laravel-5-2-how-to-update-migration-without-losing-data

            //es la migracion "add_timestamps_to_camiones_table

            //comando completo 
            //$ php artisan make:migration add_timestamps_to_camiones_table --table=camiones
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camiones');
    }
}
