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

        $this->call(ProfesorSeeder::class);

        $this->call(GrupoSeeder::class);

        Actividad::factory(10)->create();

        $this->call(ActividadesGruposSeeder::class);

        $this->call(ActividadesProfesoresSeeder::class);
    }
}
