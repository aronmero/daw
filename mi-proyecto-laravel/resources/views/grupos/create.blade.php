@extends('layouts.cabecera')

@section('title', 'Crear Grupo')

@section('content')
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre">
        </div>
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
