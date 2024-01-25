@extends('layouts.plantilla')

@section('title', 'Actividades.Edit')


@section('content')

    @can('admin.actividades.edit')
        <div> <a href="{{ route('actividades.edit', $actividad) }}">Editar</a></div>
    @endcan

    <a href="{{ route('actividades.index') }}">Volver</a>
@endsection
