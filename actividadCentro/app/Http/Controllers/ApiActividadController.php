<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Models\Actividad;
use App\Models\Grupo;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ApiActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::with('grupos', 'profesores')->orderBy('fecha')->get();

        $actividades->transform(function ($actividad) {
            $actividad->grupos = $actividad->grupos->sortBy('id');
            $actividad->profesores = $actividad->profesores->sortBy('id');
            return $actividad;
        });

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
            'message' => "Actividad creada satisfactoriamente",
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actividad = Actividad::find($id);
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
            return redirect()->route('actividades.index')->with('error', 'La actividad no existe');
        }

        $actividad->update($request->all());

        $actividad->grupos()->sync($request->input('grupos', []));

        $actividad->profesores()->sync($request->input('profesores', []));
        return response()->json([
            'status' => true,
            'message' => "Actividad actualizada satisfactoriamente",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return redirect()->route('actividades.index')->with('error', 'La actividad no existe');
        }

        $actividad->delete();
        return response()->json([
            'status' => true,
            'message' => "Actividad eliminada satisfactoriamente",
        ], 200);
    }
}
