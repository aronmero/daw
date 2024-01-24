@extends('layouts.cabecera')

@section('title', 'Actividades.Edit')

@section('content')
    <form action="{{ route('actividades.update', $actividad) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <input type="hidden" name="id" value="{{ $actividad->id }}">
        </div>
        <div>
            <input type=date name="fecha" value="{{ $actividad->fecha }}">
        </div>
        <div>
            <input type=text name="lugar" value="{{ $actividad->lugar }}">
        </div>
        <div>
            <input type=number name="duracion" value="{{ $actividad->duracion }}">
        </div>
        <div>
            <input type=area name="descripcion" value="{{ $actividad->descripcion }}">
        </div>

        <div>
            <textarea name="descripcion">{{ $actividad->descripcion }}
            </textarea>
        </div>

        <label for="grupos">Grupos:</label>
        <select name="grupos[]" multiple>
            @foreach ($grupos as $grupo)
                <option value="{{ $grupo->id }}" {{ $actividad->grupos->contains($grupo) ? 'selected' : '' }}>
                    {{ $grupo->nombre }}
                </option>
            @endforeach
        </select>

        <label for="profesores">Profesores:</label>
        <select name="profesores[]" multiple>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesor->id }}" {{ $actividad->profesores->contains($profesor) ? 'selected' : '' }}>
                    {{ $profesor->nombre }}
                </option>
            @endforeach
        </select>
        <div>
            <input type="submit" value="Enviar">
        </div>
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
        <form action="{{ route('actividades.destroy', $actividad) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="id" value="Eliminar">
        </form>
    @endcan
    <a href="{{ route('actividades.index') }}">Volver</a>
@endsection
