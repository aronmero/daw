@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')
    <div><a href="{{ route('usuarios.login') }}">Iniciar Sesion</a></div>
@endsection
