<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return view('usuarios.logeado');
        }

        return view('default');
    }

    public function login()
    {
        return view('usuarios.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect("/")->withSuccess('Inicio de sesion correctamente');
        }

        return redirect("/")->withSuccess('Los datos introducidos no son correctos');
    }

    public function logeado()
    {
        if (Auth::check()) {
            return view('usuarios.logeado');
        }

        return redirect("/")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

    public function create()
    {
        return view('usuarios.registro');
    }

    public function store(CreateUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return redirect('/')->withSuccess('¡Registro exitoso y sesión iniciada!');;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
