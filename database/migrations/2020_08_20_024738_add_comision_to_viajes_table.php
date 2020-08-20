<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddComisionToViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viajes', function (Blueprint $table) {
            $table->integer('comision');
        });
        //Codigo para buscar valores nulos/vacios de la columna nueva y setearlos a un valor predefinido
        $results = DB::table('viajes')->select('id','comision')->get();
        $i = 1;
        foreach ($results as $result){
            DB::table('viajes')
                ->where('id',$result->id)
                ->update([
                    "comision" => 0,
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
        Schema::table('viajes', function (Blueprint $table) {
            $table->dropColumn('comision');
        });
    }
}
