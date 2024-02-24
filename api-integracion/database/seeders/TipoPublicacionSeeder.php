<?php

namespace Database\Seeders;

use App\Models\tipo_publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tipo_publicacion::factory(10)->create();
    }
}
