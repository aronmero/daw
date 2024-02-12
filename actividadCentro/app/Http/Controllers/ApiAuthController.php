<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Auth;
class ApiAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $user = Profesor::where('email', $request->email)->first();

            $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'token' => $token
            ];

            return response($response, 201);

        } else {
            return response([
                'message' => ['Estas credenciales no coinciden con nuestros registros.']
            ], 404);
        }
    }

}
