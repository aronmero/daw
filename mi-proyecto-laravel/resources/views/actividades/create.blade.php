@extends('layouts.plantilla')

@section('title', 'Actividades.Create')

@section('content')
    <form action="{{ route('actividades.store') }}" method="POST">
        @csrf
        <div>
            <label>Lugar</label>
            <input type="text" name="lugar" placeholder="Lugar">
        </div>
        <div>
            <label>Descripcion</label>
            <input type="text" name="descripcion" placeholder="Descripcion">
        </div>
        <div>
            <label>Duracion</label>
            <input type="number" name="duracion" placeholder="1">
        </div>
        <div>
            <label>Fecha</label>
            <input type="date" name="fecha" value="{{ date('Y-m-d') }}">
        </div>
        <label for="grupos">Grupos:</label>
        <select name="grupos[]" multiple>
            @foreach ($grupos as $grupo)
                <option value="{{ $grupo->id }}">
                    {{ $grupo->nombre }}
                </option>
            @endforeach
        </select>

        <label for="profesores">Profesores:</label>
        <select name="profesores[]" multiple>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesor->id }}">
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
    <a href="{{ route('actividades.index') }}">Volver</a>
@endsection
