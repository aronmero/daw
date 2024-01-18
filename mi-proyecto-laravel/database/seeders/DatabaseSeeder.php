<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Actividad;
use App\Models\Profesor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        Profesor::factory()->create([
            'nombre' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234')
        ])->assignRole('Admin');

        Profesor::factory()->create([
            'nombre' => 'profesor',
            'email' => 'profesor@example.com',
            'password' => bcrypt('1234')
        ])->assignRole('Usuario');
        Profesor::factory(10)->create();
        

        Actividad::factory(10)->create();

    }
}
