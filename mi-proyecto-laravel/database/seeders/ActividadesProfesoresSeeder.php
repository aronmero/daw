<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ActividadProfesor;
use Illuminate\Support\Arr;
class ActividadesProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actividadesIds = DB::table('actividades')->pluck('id')->toArray();
        $profesoresIds = DB::table('profesores')->pluck('id')->toArray();

        //Eliminar admin de la generacion
        array_shift($profesoresIds);

        for ($i = 0; $i < count($actividadesIds); $i++) {
            $profesorId = $this->obtenerElementoAleatorio($profesoresIds);
            ActividadProfesor::insert([
                'actividad_id' => $actividadesIds[$i],
                'profesor_id' => $profesorId,
            ]);
        }

        $cantidadRegistros = count($actividadesIds) * 2;

        for ($i = 0; $i < $cantidadRegistros; $i++) {

            $actividadId = $this->obtenerElementoAleatorio($actividadesIds);
            $profesorId = $this->obtenerElementoAleatorio($profesoresIds);

            $idOcupada = DB::table("actividades_profesores")->where("actividad_id", "=", $actividadId)->where("profesor_id", "=", $profesorId)->pluck('profesor_id')->toArray();
            if (empty($idOcupada)) {

                ActividadProfesor::insert([
                    'actividad_id' => $actividadId,
                    'profesor_id' => $profesorId,
                ]);
            }
        }
    }

    private function obtenerElementoAleatorio($array)
    {
        return $array[array_rand($array)];
    }
}
