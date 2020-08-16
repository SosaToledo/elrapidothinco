<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComprobantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        /* Estos son los id que generamos y borramos */
        $ids=[1,2,3,4,5,6,7];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('comprobantes')
        ->whereIn('comprobantes.id',$ids)
        ->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('comprobantes')->insert([
                'id'=>$id,
                'id_simple_comprobante' => 'CP00'.$id,
                'id_camioneros' => $faker->numberBetween(1,9),
                'id_viaje'=> $faker->numberBetween(1,9),
                'fecha' => $faker->dateTimeBetween('+0 days','+2 years'),
                'detalles' => $faker->realText(100),
                'tipo' => $faker->randomElement(['adelanto','combustible']),
                'monto' => $faker->randomFloat(2,1000,90000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }
    }
}
