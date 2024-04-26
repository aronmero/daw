<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\token;
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
        token::create([
            'valor' => 'WE6C3x9Lqa8D2S46ojDYKd7eS9jssAssy7rHLCpcuDkTH480Xo6LQVZ8wVfJc6cw8SlBdoWSn5Gx7juyoJclEv63OjIR5AQ7l3wkEY3qJkPxee3pWjiLqLfeuP5nGfOCD1NVeYWKQScYMBS2chcwAp9qM1dpDulEfhPHu3YzOtdt3sO9MHJhwo1nvzVcrcCUT5YeMK0P'
        ]);
        $this->call(AyuntamientoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ComercioSeeder::class);


        $this->call(TipoPublicacionSeeder::class);
        $this->call(PublicacionSeeder::class);

        $this->call(SeguidosSeeder::class);

        $this->call(etiqueta_comercio::class);
        $this->call(etiqueta_publicacion::class);
        $this->call(comercio_publicacion::class);
    }
}
