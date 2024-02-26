<?php

namespace Database\Seeders;

use App\Models\comercio;
use App\Models\particular;
use App\Models\seguido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeguidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $i = 0;
        while ($i < 10) {
            $particular = particular::inRandomOrder()->first(); 
            $comercio = comercio::inRandomOrder()->first(); 

            // Verificar si ya existe una entrada con estos datos
            $existingEntry = Seguido::where('seguidor_id', $particular->usuario_id)
                                    ->where('seguido_id', $comercio->usuario_id)
                                    ->exists();

            // Si no existe, se crea una nueva entrada
            if (!$existingEntry) {
                Seguido::create([
                    'seguidor_id' => $particular->usuario_id,
                    'seguido_id' => $comercio->usuario_id,
                ]);
                $i++;
            }
        }
    }
}
