<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPruebaController extends Controller
{
    public function login()
    {
        return "hola estas en el login";
    }

    public function loginUsuario($usuarios, $apellidos = null)
    {
        if ($apellidos) {
            return "hola estas en el login: " . $usuarios . ' ' . $apellidos;
        } else {
            return "hola estas en el login: " . $usuarios;
        }
    }
}
