@extends('layouts.plantilla')

@section('title', 'Registro usuario')

@section('content')
<h2>Crear profesor</h2>
<div class="profesores">
    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" required value="{{ old('nombre') }}">
        </div>
        <div>
            <label>Primer Apellido</label>
            <input type="text" name="primerApellido" placeholder="Primer apellido" value="{{ old('primerApellido') }}">
        </div>
        <div>
            <label>Segundo Apellido</label>
            <input type="text" name="segundoApellido" placeholder="Segundo apellido" value="{{ old('segundoApellido') }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@email.com">
        </div>
        <div>
            <label>Contraseña</label>
            <input type="password" name="password" required>
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
</div>
    <a class="accion" href="{{ route('profesores.index') }}">Volver</a>
@endsection
