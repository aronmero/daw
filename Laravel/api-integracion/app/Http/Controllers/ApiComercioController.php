<?php

namespace App\Http\Controllers;

use App\Http\Requests\usuarioUpdateRequest;
use App\Models\comercio;
use App\Http\Requests\UsuarioRequest;
use App\Models\usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ComercioRequest;
use App\Http\Requests\comercioUpdateRequest;
use App\Models\Particular;
use Illuminate\Http\Request;

class ApiComercioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.comercio.index')->only('index');
        $this->middleware('can:admin.comercio.store')->only('store');
        $this->middleware('can:admin.comercio.destroy')->only('destroy');
        $this->middleware('can:admin.comercio.show')->only('show');
        $this->middleware('can:admin.comercio.update')->only('update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comercios = Comercio::with(['usuario.municipio', 'categoria'])->get();
        return $this->respuestaHTTP($comercios, 200, true);
    }

    public function showPublicaciones(string $usuario_id)
    {
        try {
            $comercio = Comercio::with('usuario.municipio', 'publicaciones')->where('usuario_id', $usuario_id)->firstOrFail();
            return $this->respuestaHTTP($comercio, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Comercio no encontrado', 404, false);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $usuarioRequest, ComercioRequest $comercioRequest)
    {
        $usuarioData = $usuarioRequest->validated();
        $comercioData = $comercioRequest->validated();

        $usuario = Usuario::create($usuarioData);
        $usuario->assignRole('Comercio');
        $comercioData['usuario_id'] = $usuario->id;

        $usuario->comercio()->create($comercioData);
        return response()->json([
            'Id del usuario' => $usuario->id
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $usuario_id)
    {
        try {
            $comercio = Comercio::with('usuario.municipio')->where('usuario_id', $usuario_id)->firstOrFail();
            return $this->respuestaHTTP($comercio, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Comercio no encontrado', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $usuario_id, usuarioUpdateRequest $usuarioRequest, comercioUpdateRequest $comercioRequest)
    {
        try {
            $usuario = Usuario::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Usuario no encontrado', 404, false);
        }

        try {
            $comercio = comercio::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Comercio no encontrado', 404, false);
        }
        $usuarioData = $usuarioRequest->validated();
        $comercioData = $comercioRequest->validated();

        if (isset($usuarioData['email']) && $usuarioData['email'] !== $usuario->email) {

            if (Usuario::where('email', $usuarioData['email'])->exists()) {
                return $this->respuestaHTTP('El correo electrónico ya está en uso', 422, false);
            }
        }

        $usuario->update($usuarioData);

        $comercio->update($comercioData);

        return $this->respuestaHTTP('Comercio actualizado exitosamente', 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuario_id)
    {
        $usuarioController = new ApiUsuarioController();
        return $usuarioController->destroy($usuario_id, 'comercio');
    }
}
