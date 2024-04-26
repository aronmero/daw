<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Categoria;
class CategoryController extends Controller
{public function __construct()
    {
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create','store');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
        $this->middleware('can:admin.categorias.edit')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('categoria.categoria', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('categoria.categoriaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {

        $categoria = Categoria::find($id);
        $categorias = Categoria::all();
        return view('categoria.categoriaEdit', ['categorias' => $categorias, 'categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria)
    {
        Categoria::find($categoria)->update($request->all());
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
