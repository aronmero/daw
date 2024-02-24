<?php

namespace Database\Seeders;

use App\Models\municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            ['nombre' => 'Barlovento'],
            ['nombre' => 'Breña Alta'],
            ['nombre' => 'Breña Baja'],
            ['nombre' => 'El Paso'],
            ['nombre' => 'Fuencaliente'],
            ['nombre' => 'Garafía'],
            ['nombre' => 'Los Llanos de Aridane'],
            ['nombre' => 'Puntagorda'],
            ['nombre' => 'Puntallana'],
            ['nombre' => 'San Andrés y Sauces'],
            ['nombre' => 'Santa Cruz de La Palma'],
            ['nombre' => 'Tazacorte'],
            ['nombre' => 'Tijarafe'],
            ['nombre' => 'Villa de Mazo']
        ];

        municipio::insert($municipios);
    }
}
