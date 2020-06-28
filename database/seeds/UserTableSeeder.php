<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','user') -> first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user -> name = 'User';
        $user-> email = 'user@thinco.com';
        $user -> password = bcrypt('Thinco2020');
        $user -> save();
        $user -> roles()->attach($role_user);

        $user  = new User();
        $user->name = 'Admin';
        $user->email = 'admin@thinco.com';
        $user->password = bcrypt('Thinco2020');
        $user -> save();
        $user->roles()->attach($role_admin);
    }
}
