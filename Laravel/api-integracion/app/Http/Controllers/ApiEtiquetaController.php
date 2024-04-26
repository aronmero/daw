<?php

namespace App\Http\Controllers;

use App\Http\Requests\etiquetaRequest;
use App\Models\etiqueta;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiEtiquetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.etiquetas.index')->only('index');
        $this->middleware('can:admin.etiquetas.store')->only('store');
        $this->middleware('can:admin.etiquetas.destroy')->only('destroy');
        $this->middleware('can:admin.etiquetas.show')->only('show');
        $this->middleware('can:admin.etiquetas.update')->only('update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas = etiqueta::all();
        return $this->respuestaHTTP($etiquetas, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(etiquetaRequest $request)
    {
        $etiqueta = etiqueta::create($request->all());

        return parent::respuestaHTTP("Etiqueta creada satisfactoriamente. ID: ".$etiqueta->id, 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try { 
            $etiqueta = etiqueta::with(['comercios.usuario','publicaciones'])->findOrFail($id);
            return $this->respuestaHTTP($etiqueta, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Etiqueta no encontrada.', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(etiquetaRequest $request, string $id)
    {
        $etiqueta = Etiqueta::find($id);

        if (!$etiqueta) {
            return parent::respuestaHTTP("Etiqueta no encontrada.", 404);
        }

        $data = $request->all();

        $etiqueta->update($data);

        return parent::respuestaHTTP("Etiqueta actualizada satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $publicacion = Etiqueta::findOrFail($id);

            $publicacion->comercios()->delete();
            $publicacion->publicaciones()->delete();

            $publicacion->delete();

            return response()->json(['message' => 'Etiqueta eliminada correctamente'], 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Etiqueta no encontrada'], 404);
        }
    }
}
