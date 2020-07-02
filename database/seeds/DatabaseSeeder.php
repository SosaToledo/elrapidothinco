<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //Generamos los usuarios por defecto del sistema.
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);

        $this->call(ProvinciasSeeder::class);
        $this->call(CiudadesSeeder::class);

        $this->call(ClientesSeeder::class);
        $this->call(CamionesSeeder::class);
        $this->call(CamionerosSeeder::class);
        
    }
}
