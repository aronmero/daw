<?php

namespace Database\Seeders;

use App\Models\usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        usuario::factory()->create([
            'nombre' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234')
        ])->assignRole('Administrador');
        
    }
}
