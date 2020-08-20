<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddLtsgasoilToComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comprobantes', function (Blueprint $table) {
            $table->float('ltsgasoil');
            $table->string('medioPago');
        });
        
        //Codigo para buscar valores nulos/vacios de la columna nueva y setearlos a un valor predefinido
        $results = DB::table('comprobantes')->select('id','ltsgasoil')->get();
        $i = 1;
        foreach ($results as $result){
            DB::table('comprobantes')
                ->where('id',$result->id)
                ->update([
                    "ltsgasoil" => 0,
                    "medioPago" => 'Efectivo'
                ]);
            $i++;
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comprobantes', function (Blueprint $table) {
            $table->dropColumn('ltsgasoil');
            $table->dropColumn('medioPago');
        });
    }
}
