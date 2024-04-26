<?php

namespace App\Http\Controllers;

use App\Http\Requests\seguidoRequest;
use App\Models\seguido;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiSeguidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.seguidos.index')->only('index');
        $this->middleware('can:admin.seguidos.info')->only('info');
        $this->middleware('can:admin.seguidos.store')->only('store');
        $this->middleware('can:admin.seguidos.destroy')->only('destroy');
        $this->middleware('can:admin.seguidos.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguidos = seguido::all();
        return $this->respuestaHTTP($seguidos, 200, true);
    }

    public function info()
    {
        $seguidos = seguido::with(['seguidor','seguido.municipio'])->get();
        return $this->respuestaHTTP($seguidos, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(seguidoRequest $request)
    {
        $seguido = seguido::create($request->all());

        return parent::respuestaHTTP("Seguido creado satisfactoriamente. ID: ".$seguido->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try { 
            $seguido = seguido::with(['seguidor','seguido.municipio'])->findOrFail($id);
            return $this->respuestaHTTP($seguido, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Seguido no encontrado.', 404, false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $seguidos = Seguido::findOrFail($id);

            $seguidos->delete();

            return response()->json(['message' => 'Seguido eliminado correctamente'], 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Seguido no encontrada'], 404);
        }
    }
}
