<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ViajesSeeder extends Seeder
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
        $ids=[1,2,3,4,5,6,7,8,9];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('viajes')
        ->whereIn('viajes.id',$ids)
        ->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('viajes')->insert([
                'id'=>$id,
                'idSimpleViaje' => 'VJ00'.$id,
                'id_camiones' => $faker->numberBetween(1,9),
                'id_acoplado'=> $faker->numberBetween(1,9),
                'id_camionero'=> $faker->numberBetween(1,9),
                'id_cliente'=> $faker->numberBetween(1,9),
                'origen'=>$faker->randomElement(['Pergamino','Colon','Salto','Rojas','Capitan Sarmiento','Duggan','Arrecifes']),
                'destino'=>$faker->randomElement(['Pergamino','Colon','Salto','Rojas','Capitan Sarmiento','Duggan','Arrecifes']),
                'estados'=>'Iniciado',
                'km_inicial'=>0,
                'km_final'=>0,
                'distancia'=>0,
                'valor'=>0,
                'ganancia_camionero'=>0,
                'tipoCamion'=>$faker->randomElement(['Chasis','Acoplado']),
                'fecha' => $faker->dateTimeBetween('+0 days','+1 month'),
                'peajes'=>0,
                'gasoil_litros'=>0,
                'gasoil_precio'=>0,
                'notaViaje'=>0,
                'guia'=>0,
                'remitos'=>0,
                'carta_porte'=>0,
                'cantidad'=>0,
                'precio'=>0,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }
    }
}
