@extends('layouts.plantilla')

@section('title', 'Actividades.Create')

@section('content')
    <div class="actividades">
        <form action="{{ route('actividades.store') }}" method="POST">
            @csrf
            <div class="datos">
                <div>
                    <label>Fecha:</label>
                    <input type="date" name="fecha" value="{{ date('Y-m-d') }}" required min="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label>Lugar:</label>
                    <input type="text" name="lugar" placeholder="Lugar" required>
                </div>
                <div>
                    <label>Duracion:</label>
                    <input type="number" name="duracion" placeholder="1" required min="1" max="8">
                </div>
                <div>
                    <label>Hora Inicio:</label>
                    <input type="time" name="horaInicio" min="08:00" max="20:00" value="{{ date('H:i') }}"
                        required>
                </div>
            </div>
            <div>
                <label>Descripcion:</label>
                <textarea name="descripcion"></textarea>
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
                <input class="accion" type="submit" value="Enviar">
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
        @endif <br>
        <a class="accion" href="{{ route('actividades.index') }}">Volver</a>
    </div>
@endsection
