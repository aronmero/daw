@extends('layouts.plantilla')

@section('title', 'Actividades.Create')

@section('content')
    <div class="actividades">
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

            <h3><label for="grupos">Grupos:</label></h3>
            <div class="checkboxs">
                @foreach ($grupos as $grupo)
                    <div>
                        <label for="grupos">{{ $grupo->nombre }}</label>
                        <input type="checkbox" name="grupos[]" value="{{ $grupo->id }}">
                    </div>
                @endforeach
            </div>

            <h3><label for="profesores">Profesores:</label></h3>
            <div class="checkboxs">
                @foreach ($profesores as $profesor)
                    <div>
                        <label for="profesores">{{ $profesor->nombre }}</label>
                        <input type="checkbox" name="profesores[]" value="{{ $profesor->id }}">
                    </div>
                @endforeach
            </div>
            <br>
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
    </div>
@endsection
