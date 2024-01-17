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
        Profesor::factory()->create([
            'nombre' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234')
        ]);

        //Actividad::factory(10)->create();

    }
}
