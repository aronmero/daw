<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.usuarios.index')->only('index');
        $this->middleware('can:admin.usuarios.show')->only('show');
        $this->middleware('can:admin.usuarios.destroy')->only('destroy');
    }
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuario_id,string $tipoUsario = 'usuario')
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
