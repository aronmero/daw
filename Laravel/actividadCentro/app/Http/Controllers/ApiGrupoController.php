<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;
use App\Models\Grupo;

class ApiGrupoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('can:admin.grupo.index')->only('index');
        $this->middleware('can:admin.grupo.create')->only('store');
        $this->middleware('can:admin.grupo.destroy')->only('destroy');
        $this->middleware('can:admin.grupo.show')->only('show');
        $this->middleware('can:admin.grupo.edit')->only('update');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        if (!$grupos) {
            return  parent::respuestaHTTP("Los grupos no ha sido encontrados.", 404);
        }
        return  parent::respuestaHTTP($grupos, 200, true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoRequest $request)
    {
        Grupo::create($request->all());
        return  parent::respuestaHTTP("Grupo creado satisfactoriamente.", 201, true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grupo = Grupo::find($id);
        if (!$grupo) {
            return   parent::respuestaHTTP("El grupo no ha sido encontrado.", 404);
        }

        return parent::respuestaHTTP($grupo, 200, true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoRequest $request, string $id)
    {
        $grupo = Grupo::find($id);
        if (!$grupo) {
            return   parent::respuestaHTTP("El grupo no ha sido encontrado.", 404);
        }

        $grupo->update($request->all());

        return parent::respuestaHTTP("Grupo actualizado satisfactoriamente.", 200, true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return  parent::respuestaHTTP("El grupo no ha sido encontrado.", 404);
        }
        $grupo->delete();

        return parent::respuestaHTTP("Grupo eliminado satisfactoriamente.", 204, true);
    }
}
