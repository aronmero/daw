@extends('layouts.default')

@section('title', 'Login')

@section('content')
<div class="login">
    <form method="POST" action="{{ route('usuarios.loginAuth') }}">
        @csrf
        <div><h2>Inicio de sesion</h2></div>
        <div><label>Email</label>
            <input type="text" placeholder="email@email.com" id="email"  name="email" required autofocus value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span >{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div><label>Contraseña</label>
            <input type="password" placeholder="Tu contraseña" id="password" name="password" required>
            @if ($errors->has('password'))
                <span >{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="remember">
            <label for="remember">Recuérdame</label><div><input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}></div>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    <br>
    <a class="boton" href="{{ route('home') }}">Volver</a></div>
</div>
@endsection
