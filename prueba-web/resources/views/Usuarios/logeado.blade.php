@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')
    <h1>Bienvenido de vuelta, {{ Auth::user()->name }}</h1>
    <form action="{{ route('usuarios.logout') }}" method="POST">
        @csrf
        @method('POST')
        <input type="submit" value="Cerrar Sesion">
    </form>
@endsection
