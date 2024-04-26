<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Http\Requests\ActividadRequestUpdate;
use App\Models\Actividad;
use App\Models\Grupo;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ApiActividadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
        $this->middleware('can:admin.actividades.create')->only('store');
        $this->middleware('can:admin.actividades.destroy')->only('destroy');
        $this->middleware('can:admin.actividades.edit')->only('update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::with([
            'grupos' => function ($query) {
                $query->orderBy('id');
            },
            'profesores' => function ($query) {
                $query->select('id', 'nombre', 'primerApellido', 'segundoApellido');
                $query->orderBy('id');
            }
        ])->orderBy('fecha')->get();

        $actividades->transform(function ($actividad) {
            $actividad->grupos = $actividad->getGruposForApiAttribute();
            $actividad->profesores = $actividad->getProfesoresForApiAttribute();
            return $actividad;
        });
        if (!$actividades) {
            return parent::respuestaHTTP("Las actividades no ha sido encontradas.", 404);
        }

        return parent::respuestaHTTP($actividades, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActividadRequest $request)
    {
        $actividad = Actividad::create($request->all());

        $actividad->grupos()->attach($request->input('grupos', []));

        $actividad->profesores()->attach($request->input('profesores', []));

        return parent::respuestaHTTP("Actividad creada satisfactoriamente.", 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return parent::respuestaHTTP("La actividad no ha sido encontrada.", 404);
        }

        return parent::respuestaHTTP($actividad, 200, true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActividadRequestUpdate $request, string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return parent::respuestaHTTP("La actividad no ha sido encontrada.", 404);
        }

        $data = $request->all();

        $actividad->update($data);

      
        if (isset($data['grupos'])) {
            $actividad->grupos()->sync($data['grupos']);
        }

        
        if (isset($data['profesores'])) {
            $actividad->profesores()->sync($data['profesores']);
        }

        return parent::respuestaHTTP("Actividad actualizada satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return parent::respuestaHTTP("La actividad no ha sido encontrada.", 404);
        }

        $actividad->delete();

        return parent::respuestaHTTP("Actividad eliminada satisfactoriamente.", 204, true);
    }
}
