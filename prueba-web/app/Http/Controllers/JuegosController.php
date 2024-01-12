<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJuego;
use App\Http\Requests\EditJuego;
use App\Models\Juego;
use App\Models\Categoria;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function test($juego, $categoria)
    {

        return view('juego.juego', ['juego' => $juego, 'categoria' => $categoria]);
    }

    public function index()
    {
        $juegoCategoria = Juego::join('categorias', 'juegos.idCategoria', '=', 'categorias.id')
            ->select('juegos.id', 'juegos.nombre', 'categorias.nombre as categoria', 'juegos.activo', 'juegos.created_at')
            ->orderBy('juegos.id', 'desc')
            ->get();
        return view('juego.juego', ['juegoCategoria' => $juegoCategoria]);
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('juego.create', ['categorias' => $categorias]);
    }
    public function store(CreateJuego $request)
    {
        Juego::create($request->all());
        return redirect()->route('juegos.index');
    }

    public function edit($juegoID)
    {
        $juego = Juego::find($juegoID);
        $categorias = Categoria::all();
        return view('juego.update', ['categorias' => $categorias, 'juego' => $juego]);
    }

    public function destroy($juegoID)
    {
        $juego = Juego::find($juegoID);
        $juego->delete();
        return redirect()->route('juegos.index');
    }
    public function update(EditJuego $datos)
    {
        Juego::find($datos->idJuego)->update($datos->all());
        return redirect()->route('juegos.index');
    }
}
