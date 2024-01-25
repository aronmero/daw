@extends('layouts.plantilla')

@section('title', 'Registro usuario')

@section('content')
    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="nombre" required value="{{ old('nombre') }}">
        </div>
        <div>
            <label>Primer Apellido</label>
            <input type="text" name="primerApellido" placeholder="primer apellido" value="{{ old('primerApellido') }}">
        </div>
        <div>
            <label>Segundo Apellido</label>
            <input type="text" name="segundoApellido" placeholder="segundo apellido" value="{{ old('segundoApellido') }}">
        </div>
        <div>
            <label>email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Contraseña</label>
            <input type="password" name="password" required>
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
    <a href="{{ route('profesores.index') }}">Volver</a>
@endsection
