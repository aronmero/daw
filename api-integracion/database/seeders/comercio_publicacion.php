<?php

namespace Database\Seeders;

use App\Models\comercio;
use App\Models\comercio_publicacion as ModelsComercio_publicacion;
use App\Models\publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class comercio_publicacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $comercios = comercio::pluck('usuario_id')->toArray();

        $publicaciones = Publicacion::pluck('id')->toArray();

      
        foreach ($publicaciones as $publicacionId) {
           
            $comercioId = $comercios[array_rand($comercios)];

            ModelsComercio_publicacion::create([
                'usuario_id' => $comercioId,
                'publicacion_id' => $publicacionId,
            ]);
        }
       
    }
}
