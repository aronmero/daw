<?php

namespace App\Http\Controllers;

use App\Http\Requests\AyuntamientoRequest;
use App\Http\Requests\ayuntamientoUpdateRequest;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\usuarioUpdateRequest;
use App\Models\ayuntamiento;
use App\Models\comercio;
use App\Models\token;
use App\Models\usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ApiAyuntamientoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.ayuntamiento.index')->only('index');
        $this->middleware('can:admin.ayuntamiento.store')->only('store');
        $this->middleware('can:admin.ayuntamiento.destroy')->only('destroy');
        $this->middleware('can:admin.ayuntamiento.show')->only('show');
        $this->middleware('can:admin.ayuntamiento.update')->only('update');
        $this->middleware('can:admin.ayuntamiento.verify')->only('verificarComercio');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ayuntamientos = Ayuntamiento::with('usuario.municipio')->get();
        return $this->respuestaHTTP($ayuntamientos, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $usuarioRequest, AyuntamientoRequest $ayuntamientoRequest)
    {
        $usuarioData = $usuarioRequest->validated();
        $ayuntamientoData = $ayuntamientoRequest->validated();

        $tokenVerification = $ayuntamientoData['tokenVerification'];
        $token = token::where('valor', $tokenVerification)->first();

        if (!$token) {
            return response()->json(['message' => 'El token de verificación no es válido.'], 400);
        }

        $usuario = usuario::create($usuarioData);
        $usuario->assignRole('Ayuntamiento');
        $ayuntamientoData['usuario_id'] = $usuario->id;
        $ayuntamientoData['tokenVerification'] = $token->id;

        $usuario->ayuntamiento()->create($ayuntamientoData);
        

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
            $ayuntamiento = Ayuntamiento::with('usuario.municipio')->where('usuario_id', $usuario_id)->firstOrFail();
            return $this->respuestaHTTP($ayuntamiento, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Ayuntamiento no encontrado', 404, false);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $usuario_id, usuarioUpdateRequest $usuarioRequest, ayuntamientoUpdateRequest $ayuntamientoRequest)
    {
        try {
            $usuario = Usuario::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Usuario no encontrado', 404, false);
        }

        try {
            $ayuntamiento = ayuntamiento::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Ayuntamiento no encontrado', 404, false);
        }
        $usuarioData = $usuarioRequest->validated();
        $ayuntamientoData = $ayuntamientoRequest->validated();

        if (isset($usuarioData['email']) && $usuarioData['email'] !== $usuario->email) {

            if (Usuario::where('email', $usuarioData['email'])->exists()) {
                return $this->respuestaHTTP('El correo electrónico ya está en uso', 422, false);
            }
        }

        $usuario->update($usuarioData);

        $ayuntamiento->update($ayuntamientoData);

        return $this->respuestaHTTP('Ayuntamiento actualizado exitosamente', 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usuario_id)
    {
        $usuarioController = new ApiUsuarioController();
        return $usuarioController->destroy($usuario_id, 'ayuntamiento');
    }
    public function verificarComercio(Request $request)
    {

        $request->validate([
            'ayuntamiento_id' => 'required|exists:ayuntamientos,usuario_id',
            'comercio_id' => 'required|exists:comercios,usuario_id',
        ]);
        try {
            $ayuntamiento = Ayuntamiento::where('usuario_id', $request->ayuntamiento_id)->firstOrFail();
            $comercio = comercio::where('usuario_id', $request->comercio_id)->firstOrFail();


            if ($comercio->verificado) {
                return response()->json(['message' => 'El comercio ya ha sido verificado previamente'], 400);
            }

            if ($ayuntamiento->usuario->municipio_id == $comercio->usuario->municipio_id) {
                $comercio->update(['verificado' => true]);
                return response()->json(['message' => 'El comercio ha sido verificado correctamente'], 200);
            } else {
                return response()->json(['message' => 'El comercio no pertenece al mismo municipio que el ayuntamiento'], 403);
            }
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Ayuntamiento o comercio no encontrado'], 404);
        }
    }
}
