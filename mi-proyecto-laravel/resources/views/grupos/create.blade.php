@extends('layouts.plantilla')

@section('title', 'Crear Grupo')

@section('content')
<h2>Crear grupo</h2>
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre del grupo</label>
            <input type="text" name="nombre" placeholder="Nombre" value={{ old('nombre') }}>
        </div>
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
    @endif
    <a class="accion" href="{{ route('grupos.index') }}">Volver</a>
@endsection
