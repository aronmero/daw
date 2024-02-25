<?php

namespace App\Http\Controllers;

use App\Http\Requests\particularUpdateRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ParticularRequest;
use App\Http\Requests\usuarioUpdateRequest;
use App\Models\Particular;
use Illuminate\Http\Request;

class ApiParticularController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     */
    public function index()
    {
        $particulares = Particular::with('usuario.municipio')->get();
        return $this->respuestaHTTP($particulares, 200, true);
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     */
    public function store(UsuarioRequest $usuarioRequest, ParticularRequest $particularRequest)
    {
        $usuarioData = $usuarioRequest->validated();
        $particularData = $particularRequest->validated();


        $usuario = Usuario::create($usuarioData);
        $particularData['usuario_id'] = $usuario->id;

        $particular = Particular::create($particularData);

        return response()->json([
            'Id del usuario' => $particular->usuario_id
        ], 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(string $usuario_id)
    {
        try {
            $particular = Particular::with('usuario.municipio')->where('usuario_id', $usuario_id)->firstOrFail();
            return $this->respuestaHTTP($particular, 200, true);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Particular no encontrado', 404, false);
        }
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(string $usuario_id, UsuarioUpdateRequest $usuarioRequest, particularUpdateRequest $particularRequest)
    {
        try {
            $usuario = Usuario::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Usuario no encontrado', 404, false);
        }

        try {
            $particular = Usuario::findOrFail($usuario_id);
        } catch (ModelNotFoundException $exception) {
            return $this->respuestaHTTP('Particular no encontrado', 404, false);
        }
        $usuarioData = $usuarioRequest->validated();
        $particularData = $particularRequest->validated();

        if (isset($usuarioData['email']) && $usuarioData['email'] !== $usuario->email) {

            if (Usuario::where('email', $usuarioData['email'])->exists()) {
                return $this->respuestaHTTP('El correo electrónico ya está en uso', 422, false);
            }
        }

        $usuario->update($usuarioData);

        $particular->update($particularData);

        return $this->respuestaHTTP('Particular actualizado exitosamente', 200, true);
    }


    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(string $usuario_id)
    {
        $usuarioController = new ApiUsuarioController();
        return $usuarioController->destroy($usuario_id,'particular');
    }
}
