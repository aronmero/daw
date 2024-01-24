@extends('layouts.cabecera')

@section('title', 'Actividades')

@section('content')
    <a href="{{ route('home') }}">Inicio</a>
    @can('admin.actividades.create')
        <a href="{{ route('actividades.create') }}">Crear Actividad</a>
    @endcan
    <h1>Listado de actividades</h1>
    <div class="contenedor">
        <div class="contenedorCartas">
            @forelse ($actividades as $actividad)
                <div class="carta">
                    <div>{{ $actividad->lugar }}</div>
                    <div>{{ $actividad->fecha }}</div>
                    <div>{{ $actividad->duracion }}</div>
                    <div>
                        Grupos:
                        @foreach ($actividad->grupos as $grupo)
                            {{ $grupo->nombre }}
                        @endforeach
                    </div>
                    <div>
                        Profesores:
                        @foreach ($actividad->profesores as $profesor)
                            {{ $profesor->nombre }}
                        @endforeach
                    </div>
                    @can('admin.actividades.edit')
                        <div><a href="{{ route('actividades.edit', $actividad) }}">Editar</a></div>
                    @endcan
                    @can('admin.actividades.destroy')
                        <div><form class="eliminar" action="{{ route('actividades.destroy', $actividad) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="id" value="Eliminar">
                        </form></div>
                    @endcan
                </div>
            @empty

                No hay actividades
            @endforelse
        </div>
    </div>

@endsection
