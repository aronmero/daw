<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApiAuthController extends Controller
{
    function index(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $user = usuario::where('email', $request->email)->first();

            $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'token' => $token
            ];
            return parent::respuestaHTTP($response, 201, true);
        } else {
            return parent::respuestaHTTP('Estas credenciales no coinciden con nuestros registros.', 404);
        }
    }
}
