<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actividadesIds = DB::table('actividades')->pluck('id')->toArray();
        $profesoresIds = DB::table('profesores')->pluck('id')->toArray();

        $cantidadRegistros = 20;

        for ($i = 0; $i < $cantidadRegistros; $i++) {

            $actividadId = $this->obtenerElementoAleatorio($actividadesIds);
            $grupoId = $this->obtenerElementoAleatorio($profesoresIds);

            DB::table('actividades_profesores')->insert([
                'actividades_id' => $actividadId,
                'profesores_id' => $grupoId,
            ]);
        }
    }

    private function obtenerElementoAleatorio($array)
    {
        return $array[array_rand($array)];
    }
}
