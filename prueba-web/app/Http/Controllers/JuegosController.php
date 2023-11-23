<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegosController extends Controller
{
    function mostrarJuegoCategoria($juego, $categoria)
    {
        return view('juego', ['juego' => $juego, 'categoria' => $categoria]);
    }

    function mostrarCategoria()
    {
        $listaJuegos = ['Factorio','Satisfactory'];
        return view('juego', ['listaJuegos' => $listaJuegos]);
    }


}
