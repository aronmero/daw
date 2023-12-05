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
        $juego->nombre = $datos->nombreJuego;
        $juego->idCategoria = $datos->idCategoria;
        $juego->save();
        return redirect()->route('create');
    }

    public function juegoView($juegoID)
    {
        $juego = Juego::find($juegoID);
        $categorias = Categoria::all();
        return view('update', ['categorias' => $categorias, 'juego' => $juego]);
    }
    public function juegosUpdate(Request $datos)
    {
        $juego = Juego::find($datos->idJuego);
        $juego->nombre = $datos->nombreJuego;
        $juego->idCategoria = $datos->idCategoria;
        $juego->activo = $datos->activo;
        $juego->save();
        return redirect()->route('create');
    }
   
}
