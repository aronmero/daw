@extends('layouts.plantilla')

@section('title', 'Ver grupo')


@section('content')
<h2>Ver grupo</h2>
    
    <div><b>Nombre:</b> {{ $grupo->nombre }}</div>
    @can('admin.grupo.edit')
        <div> <a class="accion" href="{{ route('grupos.edit', $grupo) }}">Editar</a></div>
    @endcan
    <a class="accion" href="{{ route('grupos.index') }}">Volver</a>
@endsection
