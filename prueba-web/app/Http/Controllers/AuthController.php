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
        if (Auth::viaRemember()) {
            return view('usuarios.logeado');
        }
        if (Auth::check()) {

            return view('usuarios.logeado');
        }

        return view('default');
    }

    public function login()
    {
        if (Auth::check()) {
            return view('usuarios.logeado');
        }
        
        return view('usuarios.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$request->remember)) {
            $request->session()->regenerate();
            return redirect("/")->withSuccess('Inicio de sesion correctamente');
        }

        return back()->withErrors([
            'email' => 'El correo y/o contraseña no son correctos',
        ])->onlyInput('email');
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
        if (Auth::check()) {
            return view('usuarios.logeado');
        }

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
