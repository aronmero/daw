<?php

namespace Database\Seeders;

use App\Models\etiqueta;
use App\Models\etiqueta_publicacion as ModelsEtiqueta_publicacion;
use App\Models\publicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class etiqueta_publicacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = etiqueta::pluck('id')->toArray();

        $publicaciones = publicacion::pluck('id')->toArray();


        foreach ($publicaciones as $publicacionId) {

            $etiquetaId = $etiquetas[array_rand($etiquetas)];

            ModelsEtiqueta_publicacion::create([
                'etiqueta_id' => $etiquetaId,
                'publicacion_id' => $publicacionId
            ]);
        }
    }
}
