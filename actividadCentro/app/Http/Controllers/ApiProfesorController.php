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
        if (!$profesores) {
            return   parent::respuestaHTTP("Los profesores no ha sido encontrados.", 404);
        }
        return parent::respuestaHTTP($profesores, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfesorRequest $request)
    {
        Profesor::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'primerApellido' => $request->input('primerApellido'),
            'segundoApellido' => $request->input('segundoApellido'),
            'password' => bcrypt($request->input('password'),)
        ])->assignRole('Usuario');
        return  parent::respuestaHTTP("Profesor creado satisfactoriamente.", 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesor = Profesor::find($id);
        if (!$profesor) {
            return   parent::respuestaHTTP("El profesor no ha sido encontrado.", 404);
        }
        return parent::respuestaHTTP($profesor, 200, true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesorEditRequest $request, string $id)
    {
        $profesor = Profesor::find($id);
        if (!$profesor) {
            return  parent::respuestaHTTP("El profesor no ha sido encontrado.", 404);
        }
        $profesor->update($request->all());
        return  parent::respuestaHTTP("Profesor actualizado satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Profesor::find($id);
        if (!$profesor) {
            return    parent::respuestaHTTP("El profesor no ha sido encontrado.", 404);
        }
        $profesor->delete();

        return parent::respuestaHTTP("Profesor eliminado satisfactoriamente.", 204, true);
    }
}
