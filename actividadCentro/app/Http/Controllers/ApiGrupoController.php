<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;
use App\Models\Grupo;

class ApiGrupoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.grupo.index')->only('index');
        $this->middleware('can:admin.grupo.create')->only('store');
        $this->middleware('can:admin.grupo.destroy')->only('destroy');
        $this->middleware('can:admin.grupo.show')->only('show');
        $this->middleware('can:admin.grupo.edit')->only('update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        if (!$grupos) {
            return response()->json([
                'status' => false,
                'message' => "Los grupos no ha sido encontrados.",
            ], 404);
        }
        return response()->json([
            'status' => true,
            'actividades' => $grupos
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoRequest $request)
    {
        Grupo::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Grupo creado satisfactoriamente.",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grupo = Grupo::find($id);
        if (!$grupo) {
            return response()->json([
                'status' => false,
                'message' => "El grupo no ha sido encontrado.",
            ], 404);
        }
        return response()->json([
            'status' => true,
            'actividad' => $grupo
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoRequest $request, string $id)
    {
        $grupo = Grupo::find($id);
        if (!$grupo) {
            return response()->json([
                'status' => false,
                'message' => "El grupo no ha sido encontrado.",
            ], 404);
        }

        $grupo->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Grupo actualizado satisfactoriamente.",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grupo = Grupo::find($id);


        if (!$grupo) {
            return response()->json([
                'status' => false,
                'message' => "El grupo no ha sido encontrado.",
            ], 404);
        }
        $grupo->delete();
        return response()->json([
            'status' => true,
            'message' => "Grupo eliminado satisfactoriamente.",
        ], 204);
    }
}
