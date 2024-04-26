@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')
    <td><a href="{{ route('usuarios.login') }}">Iniciar Sesion</a></td>
    <td><a href="{{ route('usuarios.create') }}">Registro</a></td>
@endsection
