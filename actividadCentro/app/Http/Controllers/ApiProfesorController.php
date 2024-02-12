<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesorEditRequest;
use App\Http\Requests\ProfesorPasswordRequest;
use App\Http\Requests\ProfesorRequest;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.usuario.index')->only('index');
        $this->middleware('can:admin.usuario.create')->only('store');
        $this->middleware('can:admin.usuario.destroy')->only('destroy');
        $this->middleware('can:admin.usuario.show')->only('show');
        $this->middleware('can:admin.usuario.edit')->only('update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::all();
        return response()->json([
            'status' => true,
            'profesores' => $profesores
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Profesor::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'primerApellido' => $request->input('primerApellido'),
            'segundoApellido' => $request->input('segundoApellido'),
            'password' => bcrypt($request->input('password'), )
        ])->assignRole('Usuario');
        return response()->json([
            'status' => true,
            'message' => "Profesor creado satisfactoriamente",
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesor = Profesor::find($id);
        return response()->json([
            'status' => true,
            'profesor' => $profesor
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Profesor::find($id)->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Profesor actualizado satisfactoriamente",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesores = Profesor::find($id);
        $profesores->delete();
        return response()->json([
            'status' => true,
            'message' => "Profesor eliminado satisfactoriamente",
        ], 200);
    }
}
