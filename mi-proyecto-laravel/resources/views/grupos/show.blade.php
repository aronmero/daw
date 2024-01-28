@extends('layouts.plantilla')

@section('title', 'Ver grupo')


@section('content')
    @can('admin.grupo.edit')
        <div> <a class="accion" href="{{ route('grupos.edit', $grupo) }}">Editar</a></div>
    @endcan
    <div><b>Nombre:</b> {{ $grupo->nombre }}</div>
    <a class="accion" href="{{ route('grupos.index') }}">Volver</a>
@endsection
