<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadRequest;
use App\Models\Actividad;
use App\Models\Grupo;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can:admin.actividades.index')->only('index');
        $this->middleware('can:admin.actividades.create')->only('create', 'store');
        $this->middleware('can:admin.actividades.destroy')->only('destroy');
        $this->middleware('can:admin.actividades.edit')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::with(['grupos' => function ($query) {
            $query->orderBy('id');
        }, 'profesores' => function ($query) {
            $query->select('id', 'nombre', 'primerApellido', 'segundoApellido', 'email');
            $query->orderBy('id');
        }])->orderBy('fecha')->get();


        return view("actividades.index", ['actividades' => $actividades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo::all();
        $profesores = Profesor::all()->slice(1);
        //Profesor::where('id','!=','1')->get()
        return view("actividades.create" ,compact('grupos', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActividadRequest $request)
    {
        $actividad = Actividad::create($request->all());

        $actividad->grupos()->attach($request->input('grupos', []));

        $actividad->profesores()->attach($request->input('profesores', []));

        return redirect()->route('actividades.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $actividad = Actividad::find($id);
        return view('actividades.show', ['actividad' => $actividad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $actividad = Actividad::find($id);
        $grupos = Grupo::all();
        $profesores = Profesor::all()->slice(1);

        return view('actividades.edit',  compact('actividad', 'grupos', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActividadRequest $request, string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return redirect()->route('actividades.index')->with('error', 'La actividad no existe');
        }

        $actividad->update($request->all());

        $actividad->grupos()->sync($request->input('grupos', []));


        $actividad->profesores()->sync($request->input('profesores', []));

        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::find($id);

        if (!$actividad) {
            return redirect()->route('actividades.index')->with('error', 'La actividad no existe');
        }

        $actividad->delete();

        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada exitosamente');
    }
}
