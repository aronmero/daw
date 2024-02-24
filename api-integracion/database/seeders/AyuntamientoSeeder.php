<?php

namespace Database\Seeders;

use App\Models\ayuntamiento;
use App\Models\usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AyuntamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = usuario::factory()->create([
            'nombre' => 'ayuntamiento',
            'email' => 'ayuntamiento@example.com',
            'password' => bcrypt('1234')
        ]);

        ayuntamiento::factory()->create(['usuario_id' => $usuario->id,]);

        ayuntamiento::factory(10)->create();
    }
}
