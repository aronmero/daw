@extends('layouts.plantilla')

@section('title', 'Actividades.Edit')

@section('content')
<h2>Editar actividad</h2>
    <div class="actividades">
        <form action="{{ route('actividades.update', $actividad) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="datos">
                <div>
                    <input type="hidden" name="id" value="{{ $actividad->id }}">
                </div>
                <div>
                    <label>Fecha:</label>
                    <input type=date name="fecha" value="{{ old('fecha') ?? $actividad->fecha }}" min="{{ date('Y-m-d') }}" required>
                </div>
                <div>
                    <label>Lugar:</label>
                    <input type=text name="lugar" value="{{ old('lugar') ?? $actividad->lugar }}" required>
                </div>
                <div>
                    <label>Duracion en horas:</label>
                    <input type=number name="duracion" value="{{ old('duracion') ?? $actividad->duracion }}" required min="1"
                        max="720">
                </div>
                <div>
                    <label>Hora Inicio:</label>
                    <input type="time" name="horaInicio" min="08:00" max="20:00"
                        value="{{  old('horaInicio') ?? substr($actividad->horaInicio, 0, 5) }}" required>
                </div>
            </div>
            <div>
                <label>Descripcion:</label>
                <textarea name="descripcion">{{  old('descripcion') ??$actividad->descripcion }}</textarea>
            </div>


            <h3><label for="grupos">Grupos:</label></h3>
            <div class="checkboxs">
                @foreach ($grupos as $grupo)
                    <div>
                        <label for="grupos">{{ $grupo->nombre }}</label>
                        <input type="checkbox" name="grupos[]" value="{{ $grupo->id }}"
                            {{ $actividad->grupos->contains($grupo) ? 'checked' : '' }}>
                    </div>
                @endforeach
            </div>

            <h3><label for="profesores">Profesores:</label></h3>
            <div class="checkboxs">
                @foreach ($profesores as $profesor)
                    <div>
                        <label for="profesores">{{ $profesor->nombre }}</label>
                        <input type="checkbox" name="profesores[]" value="{{ $profesor->id }}"
                            {{ $actividad->profesores->contains($profesor) ? 'checked' : '' }}>
                    </div>
                @endforeach
            </div>
            <br>
            <div>
                <input class="accion" type="submit" value="Enviar">
            </div>
            <br>
        </form>
        @if ($errors->any())
            <br>
            <div>
                <strong>¡Ups! Hubo algunos problemas con tu entrada:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @can('admin.actividades.destroy')
            <form action="{{ route('actividades.destroy', $actividad) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');">
                @csrf
                @method('DELETE')
                <input class="accion" type="submit" name="id" value="Eliminar">
            </form>
        @endcan
        <br>
        <a class="accion" href="{{ route('actividades.index') }}">Volver</a>
    </div>
@endsection
