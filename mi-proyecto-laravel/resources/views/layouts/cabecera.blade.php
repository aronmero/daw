@extends('layouts.plantilla')

@section('head')
    <div class="cabecera">
        <h1>Bienvenido de vuelta, {{ Auth::user()->nombre }}</h1>
        <div>
            <form action="{{ route('usuarios.logout') }}" method="POST">
                @csrf
                @method('POST')
                <input type="submit" value="Cerrar Sesion">
            </form>
        </div>
    </div>
@endsection
