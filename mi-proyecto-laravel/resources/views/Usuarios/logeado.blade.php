@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
    <h1>Bienvenido de vuelta, {{ Auth::user()->nombre }}</h1>
    <form action="{{ route('usuarios.logout') }}" method="POST">
        @csrf
        @method('POST')
        <input type="submit" value="Cerrar Sesion">
    </form>
@endsection
