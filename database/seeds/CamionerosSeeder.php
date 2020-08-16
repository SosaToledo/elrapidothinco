<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CamionerosSeeder extends Seeder
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

        DB::table('camioneros')
        ->whereIn('camioneros.id',$ids)
        ->delete();

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('camioneros')->insert([
                'id'=>$id,
                'id_simple_camioneros' => 'CM00'.$id,
                'DNI' => $faker->numerify('########'),
                'telefono' => $faker->numerify('##########'),
                'cbu' => $faker->numerify('###########'),
                'nombre' => $faker->firstName(),
                'apellido' => $faker->lastName(),
                'direccion' => $faker->sentence(2).' '.$faker->numerify('##'),
                'fecha_alta_temprana' => $faker->dateTimeBetween('-1 years','+1 years'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }
    }
}
