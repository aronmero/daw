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


            //$request->session()->regenerate();
            //return redirect("/")->withSuccess('Inicio de sesion correctamente');
        } else {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
