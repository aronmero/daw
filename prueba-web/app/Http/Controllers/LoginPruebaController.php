<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPruebaController extends Controller
{
    public function login()
    {
        $array = [];//["juan", "paco", "teresa"];
        return view('login', ['usuarios' => $array]);
    }

    public function usuario($usuarios, $apellidos = null)
    {
        return view('usuario', ['usuario' => $usuarios, 'apellidos' => $apellidos]);
    }
}
