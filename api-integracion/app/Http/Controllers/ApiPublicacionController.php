<?php

namespace App\Http\Controllers;

use App\Http\Requests\publicacionRequest;
use App\Http\Requests\publicacionUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Publicacion;
class ApiPublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::with(['tipo','comercios.usuario','etiquetas'])->get();
        return response()->json($publicaciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(publicacionRequest $request)
    {
        $publicacion = Publicacion::create($request->all());

        $publicacion->comercios()->attach($request->input('comercios', []));

        $publicacion->etiquetas()->attach($request->input('etiquetas', []));

        return parent::respuestaHTTP("Actividad creada satisfactoriamente. ID: ".$publicacion->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try { 
            $publicacion = Publicacion::with(['tipo','comercios.usuario','etiquetas'])->findOrFail($id);
            return $this->respuestaHTTP($publicacion, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Publicacion no encontrada.', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(publicacionUpdateRequest $request, string $id)
    {
        $publicacion = Publicacion::find($id);

        if (!$publicacion) {
            return parent::respuestaHTTP("Publicacion no encontrada.", 404);
        }

        $data = $request->all();

        $publicacion->update($data);

      
        if (isset($data['comercios'])) {
            $publicacion->comercios()->sync($data['comercios']);
        }

        
        if (isset($data['etiquetas'])) {
            $publicacion->etiquetas()->sync($data['etiquetas']);
        }

        return parent::respuestaHTTP("Publicacion actualizada satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $publicacion = Publicacion::findOrFail($id);

            $publicacion->comercios()->delete();
            $publicacion->etiquetas()->delete();

            $publicacion->delete();

            return response()->json(['message' => 'Publicacion eliminada correctamente'], 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Publicacion no encontrada'], 404);
        }
    }
}
