<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.usuario.index')->only('index');
        $this->middleware('can:admin.usuario.create')->only('create', 'store');
        $this->middleware('can:admin.usuario.destroy')->only('destroy');
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
    public function store(CreateUser $request)
    {
        Profesor::create($request->all());
        return redirect()->route('profesores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //FIXME: Sin terminar
        //Profesor::find($id)->update($request->all());
        return redirect()->route('profesores.index');
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
