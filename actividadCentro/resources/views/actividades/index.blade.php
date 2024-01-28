@extends('layouts.plantilla')

@section('title', 'Actividades')

@section('content')
    <div class="actividades">
        <h1>Listado de actividades</h1>
        @can('admin.actividades.create')
            <a class="accion" href="{{ route('actividades.create') }}">Crear Actividad</a>
        @endcan
        <div class="contenedor">
            <div class="contenedorCartas">
                @forelse ($actividades as $actividad)
                    <div class="carta">
                        <div>{{ $actividad->lugar }}</div>
                        <div>{{ $actividad->fecha }}</div>
                        <div><b>Inicio a las </b> {{ \Carbon\Carbon::parse($actividad->horaInicio)->format('H:i') }}</div>
                        <div><b>Duracion:</b> {{ $actividad->duracion }} {{ $actividad->duracion > 1 ? 'horas' : 'hora' }}
                        </div>
                        <div>
                            <b> Grupos:</b>
                            @foreach ($actividad->grupos as $grupo)
                                {{ $grupo->nombre }}
                            @endforeach
                        </div>
                        <div>
                            <b>Profesores:</b>
                            @foreach ($actividad->profesores as $profesor)
                                {{ $profesor->nombre }}
                            @endforeach
                        </div>
                        <div>
                            @can('admin.actividades.show')
                                <td><a class="accion" href="{{ route('actividades.show', $actividad) }}">Ver</a></td>
                            @endcan
                            @can('admin.actividades.edit')
                                <div><a class="accion" href="{{ route('actividades.edit', $actividad) }}">Editar</a></div>
                            @endcan

                            @can('admin.actividades.destroy')
                                <div>
                                    <form class="eliminar" action="{{ route('actividades.destroy', $actividad) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');">
                                        @csrf
                                        @method('DELETE')
                                        <input class="accion" type="submit" name="id" value="Eliminar">
                                    </form>
                                </div>
                            @endcan

                        </div>
                    </div>
                @empty
                    No hay actividades
                @endforelse
            </div>
        </div>
    </div>
@endsection
