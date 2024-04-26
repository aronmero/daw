<?php

namespace Database\Seeders;

use App\Models\comercio;
use App\Models\usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario =   usuario::factory()->create([
            'nombre' => 'comercio',
            'email' => 'comercio@example.com',
            'municipio_id'=>1,
            'password' => bcrypt('1234')
        ])->assignRole('Comercio');;

        comercio::factory()->create(['usuario_id' => $usuario->id,'verificado'=>false]);

        comercio::factory(10)->create();
    }
}
