<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 4; $i++) {
            Grupo::insert([
                'nombre' => $i . 'º ESO',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
        for ($i = 1; $i <= 2; $i++) {
            Grupo::insert([
                'nombre' => $i . 'º Bach',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
