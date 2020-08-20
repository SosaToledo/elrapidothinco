<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsAcoplado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acoplado', function (Blueprint $table) {
            $table->date("ruta_vencimiento", 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acoplado', function (Blueprint $table) {
            $table->dropColumn('ruta_vencimiento');
        });
    }
}
