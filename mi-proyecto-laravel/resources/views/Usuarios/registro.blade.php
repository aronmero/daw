@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')
    <form method="POST" action="{{ route('usuarios.store') }}">
        @csrf
        <div>
            <input type="text" placeholder="Name" id="name" name="name" required autofocus value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span >{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <input type="text" placeholder="Email" id="email" name="email" required autofocus value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span >{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div>
            <input type="password" placeholder="Password" id="password"  name="password" required >
            @if ($errors->has('password'))
                <span >{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    <a href="{{ route('home') }}">Volver</a>
@endsection
