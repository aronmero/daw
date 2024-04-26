<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesorEditRequest;
use App\Http\Requests\ProfesorPasswordRequest;
use App\Http\Requests\ProfesorRequest;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.usuario.index')->only('index');
        $this->middleware('can:admin.usuario.create')->only('create', 'store');
        $this->middleware('can:admin.usuario.destroy')->only('destroy');
        $this->middleware('can:admin.usuario.show')->only('show');
        $this->middleware('can:admin.usuario.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::all();

        return view('admin.dashboard', ['profesores' => $profesores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create");
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
            'password' => bcrypt($request->input('password'), )
        ])->assignRole('Usuario');
        return redirect()->route('profesores.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profesor = Profesor::find($id);
        return view('admin.edit', ['profesor' => $profesor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesorEditRequest $request, string $id)
    {
        Profesor::find($id)->update($request->all());
        return redirect()->route('profesores.index');
    }

    public function updatePassword(ProfesorPasswordRequest $request, string $id)
    {
        $profesor = Profesor::find($id);

        // Verifica la contraseña actual
        if (!Hash::check($request->input('password_actual'), $profesor->password)) {
            return redirect()->back()->withErrors(['password_actual' => 'La contraseña actual es incorrecta.']);
        }

        $profesor->update([
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Contraseña actualizada correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesor = Profesor::find($id);
        return view('admin.show', ['profesor' => $profesor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesores = Profesor::find($id);
        $profesores->delete();

        return redirect()->route('profesores.index');
    }
}
