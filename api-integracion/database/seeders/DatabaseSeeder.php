<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $this->call(MunicipiosSeeder::class);
        $this->call(UsuarioSeeder::class);

        $this->call(EtiquetaSeeder::class);

        $this->call(ParticularSeeder::class);
        $this->call(TokenSeeder::class);
        $this->call(AyuntamientoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ComercioSeeder::class);


        $this->call(TipoPublicacionSeeder::class);
        $this->call(PublicacionSeeder::class);

        $this->call(SeguidosSeeder::class);
    }
}
