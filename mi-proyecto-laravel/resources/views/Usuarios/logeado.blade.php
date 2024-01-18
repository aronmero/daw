@extends('layouts.plantilla')

@section('title', 'Home')

@section('style')
    <style>
        .cabecera {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('content')
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
    <div> 
        @can('admin.usuario.index')
            <a href="{{ route('profesores.index') }}">Profesores</a>
        @endcan
        <a href="{{ route('actividades.index') }}">Actividades</a>
        <a href="{{ route('grupos.index') }}">Grupos</a>
    </div>


@endsection
