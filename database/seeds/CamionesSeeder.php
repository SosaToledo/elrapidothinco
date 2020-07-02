<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CamionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camiones')->insert([
            'id_simple_camiones' => 22,
            'patente' => 'asd123', 
            'vtv_vencimiento' =>  Carbon::now(),
            'senasa_vencimiento' => Carbon::now(),
            'seguro_vencimiento' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
