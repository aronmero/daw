@extends('layouts.plantilla')

@section('title', 'Ver profesor')


@section('content')
<h2>Ver profesor</h2>
    <div>
        <div><b>Nombre:</b> {{ $profesor->nombre }}</div>
        <div><b>Primer Apellido:</b> {{ $profesor->primerApellido }}</div>
        <div><b>Segundo Apellido:</b> {{ $profesor->segundoApellido }}</div>
        <div><b>Email:</b> {{ $profesor->email }}</div>
        
    </div>
    @can('admin.usuario.edit')
        <div> <a class="accion" href="{{ route('profesores.edit', $profesor) }}">Editar</a></div>
    @endcan
    <a class="accion" href="{{ route('profesores.index') }}">Volver</a>
@endsection
