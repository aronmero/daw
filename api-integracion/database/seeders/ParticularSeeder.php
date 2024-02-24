<?php

namespace Database\Seeders;

use App\Models\particular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\usuario;

class ParticularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usuario =   usuario::factory()->create([
            'nombre' => 'particular',
            'email' => 'particular@example.com',
            'password' => bcrypt('1234')
        ]);
        particular::factory()->create(['usuario_id' => $usuario->id,]);

        particular::factory(10)->create();
    }
}
