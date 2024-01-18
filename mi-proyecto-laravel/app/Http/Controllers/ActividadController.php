<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function __construct()
    {
       // $this->middleware('can:admin.actividades.index')->only('index');
        $this->middleware('can:admin.actividades.create')->only('create','store');
        $this->middleware('can:admin.actividades.destroy')->only('destroy');
        $this->middleware('can:admin.actividades.edit')->only('edit','update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades=Actividad::all();
        return view("actividades.index",['actividades' => $actividades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("actividades.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Actividad::create($request->all());
        return redirect()->route('actividades.index');
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
        $actividad = Actividad::find($id);
        $actividades = Actividad::all();
        return view('actividades.edit', ['actividades' => $actividades, 'actividad' => $actividad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Actividad::find($id)->update($request->all());
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividades = Actividad::find($id);
        $actividades->delete();

        return redirect()->route('actividades.index');
    }
}
