<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        User::create([
            'name'=> 'Alexander',
            'email'=> 'alexander@alexander.com',
            'escuela'=> 'colegio32',
            'password'=> bcrypt('alexander@alexander.com'),
        ])->assignRole('Admin'); // 'Admin' de la linea 20 de archivo 'RoleSeeder.php'

        User::create([
            'name'=> 'Roberto Martinez',
            'email'=> 'roberto@gmail.com',
            'escuela'=> 'colegio32',
            'password'=> bcrypt('roberto.2roberto'),
        ])->assignRole('Responsable'); // 'Admin' de la linea 20 de archivo 'RoleSeeder.php'

        // User::factory(2)->create(); // de la linea 21 'RoleSeeder.php'
    }
}
