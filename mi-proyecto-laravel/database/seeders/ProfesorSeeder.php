<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;
class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
