<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Categoria;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function mostrarJuegoCategoria($juego, $categoria)
    {

        return view('juego', ['juego' => $juego, 'categoria' => $categoria]);
    }

    public function mostrarCategoria()
    {
        $juegoCategoria = Juego::join('categorias', 'juegos.idCategoria', '=', 'categorias.id')
            ->select('juegos.nombre', 'categorias.nombre as categoria', 'juegos.activo', 'juegos.created_at')
            ->orderBy('juegos.id', 'desc')
            ->get();
        //  $listaCategorias = Categoria::all();
        //$listaJuegos = Juego::all();
        dump($juegoCategoria);
        //$listaJuegos = ['Factorio', 'Satisfactory'];
        return view('juego', ['juegoCategoria' => $juegoCategoria]);
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('create', ['categorias' => $categorias]);
    }
    public function juegosCreate(Request $datos)
    {
        $juego = new Juego();
        $juego->nombre = $datos->NombreJuego;
        $juego->idCategoria = $datos->idCategoria;
        $juego->save();
        return redirect ()->route('create');
    }
}
