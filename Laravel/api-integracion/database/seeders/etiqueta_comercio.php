<?php

namespace Database\Seeders;

use App\Models\comercio;
use App\Models\etiqueta;
use App\Models\etiqueta_comercio as ModelsEtiqueta_comercio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class etiqueta_comercio extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = etiqueta::pluck('id')->toArray();

        $comercios = comercio::pluck('usuario_id')->toArray();


        foreach ($comercios as $comercioId) {

            $etiquetaId = $etiquetas[array_rand($etiquetas)];

            ModelsEtiqueta_comercio::create([
                'usuario_id' => $comercioId,
                'etiqueta_id' => $etiquetaId,
            ]);
        }
    }
}
