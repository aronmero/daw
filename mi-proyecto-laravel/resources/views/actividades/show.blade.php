@extends('layouts.plantilla')

@section('title', 'Ver Actividad')


@section('content')
    <div class="actividades">
        @can('admin.actividades.edit')
            <div> <a class="accion" href="{{ route('actividades.edit', $actividad) }}">Editar</a></div>
        @endcan

        <div>
            <div><b>Lugar:</b> {{ $actividad->lugar }}</div>
            <div><b>Fecha:</b> {{ $actividad->fecha }}</div>
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
            <div><b>Descripcion:</b> {{ $actividad->descripcion }}</div>
        </div>
    </div>
    <a class="accion" href="{{ route('actividades.index') }}">Volver</a>
@endsection
