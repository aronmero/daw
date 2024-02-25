<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with('municipio')->get();
        $usuarios->makeVisible(['id']);
        return $this->respuestaHTTP($usuarios, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try { 
            $usuario = Usuario::with('municipio')->findOrFail($id);
            $usuario->makeVisible(['id']);
            return $this->respuestaHTTP($usuario, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Usuario no encontrado', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuario_id,string $tipoUsario)
    {
        try {
            // Buscar el usuario
            $usuario = usuario::findOrFail($usuario_id);

            // Eliminar los registros relacionados en particulares, comercios y ayuntamientos
            $usuario->particular()->delete();
            $usuario->comercio()->delete();
            $usuario->ayuntamiento()->delete();

            // Finalmente, eliminar el usuario
            $usuario->delete();

            return response()->json(['message' => 'Usuario eliminado correctamente'], 204);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'El '.$tipoUsario.' no ha sido encontrado'], 404);
        }
    }
}
