<?php

namespace Database\Seeders;

use App\Models\ActividadGrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesGruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actividadesIds = DB::table('actividades')->pluck('id')->toArray();
        $gruposIds = DB::table('grupos')->pluck('id')->toArray();

        for ($i = 0; $i < count($actividadesIds); $i++) {
            $grupoId = $this->obtenerElementoAleatorio($gruposIds);
            ActividadGrupo::insert([
                'actividad_id' => $actividadesIds[$i],
                'grupo_id' => $grupoId,
            ]);
        }

        $cantidadRegistros = count($actividadesIds) * 2;

        for ($i = 0; $i < $cantidadRegistros; $i++) {

            $actividadId = $this->obtenerElementoAleatorio($actividadesIds);
            $grupoId = $this->obtenerElementoAleatorio($gruposIds);

            ActividadGrupo::insert([
                'actividad_id' => $actividadId,
                'grupo_id' => $grupoId,
            ]);
        }
    }

    private function obtenerElementoAleatorio($array)
    {
        return $array[array_rand($array)];
    }
}
