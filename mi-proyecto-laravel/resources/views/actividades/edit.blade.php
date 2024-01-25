@extends('layouts.plantilla')

@section('title', 'Actividades.Edit')

@section('content')
<div class="actividades">
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

        <h3><label for="grupos">Grupos:</label></h3>
        <div class="checkboxs">
            @foreach ($grupos as $grupo)
                <div>
                    <label for="grupos">{{ $grupo->nombre }}</label>
                    <input type="checkbox" name="grupos[]" value="{{ $grupo->id }}" {{ $actividad->grupos->contains($grupo) ? 'checked' : '' }}>
                </div>
            @endforeach
        </div>

        <h3><label for="profesores">Profesores:</label></h3>
        <div class="checkboxs">
            @foreach ($profesores as $profesor)
                <div>
                    <label for="profesores">{{ $profesor->nombre }}</label>
                    <input type="checkbox" name="profesores[]" value="{{ $profesor->id }}"  {{ $actividad->profesores->contains($profesor) ? 'checked' : '' }}>
                </div>
            @endforeach
        </div>
        <br>
        <div>
            <input type="submit" value="Enviar">
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
        <form action="{{ route('actividades.destroy', $actividad) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="id" value="Eliminar">
        </form>
    @endcan
    <a href="{{ route('actividades.index') }}">Volver</a>
</div>
@endsection
