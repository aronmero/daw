<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
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
        $actividades = Actividad::with(['grupos' => function ($query) {
            $query->orderBy('id');
        }, 'profesores' => function ($query) {
            $query->select('id', 'nombre', 'primerApellido', 'segundoApellido');
            $query->orderBy('id');
        }])->orderBy('fecha')->get();

        $actividades->transform(function ($actividad) {
            $actividad->grupos = $actividad->getGruposForApiAttribute();
            $actividad->profesores = $actividad->getProfesoresForApiAttribute();
            return $actividad;
        });
        if (!$actividades) {
            return response()->json([
                'status' => false,
                'message' => "Los actividades no ha sido encontradas.",
            ], 404);
        }

        return response()->json([
            'status' => true,
            'actividades' => $actividades
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActividadRequest $request)
    {
        $actividad = Actividad::create($request->all());

        $actividad->grupos()->attach($request->input('grupos', []));

        $actividad->profesores()->attach($request->input('profesores', []));

        return response()->json([
            'status' => true,
            'message' => "Actividad creada satisfactoriamente.",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return response()->json([
                'status' => false,
                'message' => "La actividad no ha sido encontrada.",
            ], 404);
        }

        return response()->json([
            'status' => true,
            'actividad' => $actividad
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActividadRequest $request, string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return response()->json([
                'status' => false,
                'message' => "La actividad no ha sido encontrada.",
            ], 404);
        }

        $actividad->update($request->all());

        $actividad->grupos()->sync($request->input('grupos', []));

        $actividad->profesores()->sync($request->input('profesores', []));
        return response()->json([
            'status' => true,
            'message' => "Actividad actualizada satisfactoriamente.",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return response()->json([
                'status' => false,
                'message' => "La actividad no ha sido encontrada.",
            ], 404);
        }

        $actividad->delete();
        return response()->json([
            'status' => true,
            'message' => "Actividad eliminada satisfactoriamente.",
        ], 204);
    }
}
