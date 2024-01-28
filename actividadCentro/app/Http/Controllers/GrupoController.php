<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.grupo.index')->only('index');
        $this->middleware('can:admin.grupo.create')->only('create', 'store');
        $this->middleware('can:admin.grupo.destroy')->only('destroy');
        $this->middleware('can:admin.grupo.show')->only('show');
        $this->middleware('can:admin.grupo.edit')->only('edit', 'update');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        return view("grupos.index", ['grupos' => $grupos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("grupos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoRequest $request)
    {
        Grupo::create($request->all());
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.show', ['grupo' => $grupo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grupo = Grupo::find($id);
        return view('grupos.edit', ['grupo' => $grupo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoRequest $request, string $id)
    {
        Grupo::find($id)->update($request->all());
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        return redirect()->route('grupos.index');
    }
}
