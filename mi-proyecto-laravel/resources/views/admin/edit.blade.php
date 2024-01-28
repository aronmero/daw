@extends('layouts.plantilla')

@section('title', 'Editar usuario')

@section('content')
<h2>Editar profesor</h2>
    <form action="{{ route('profesores.update', $profesor) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $profesor->id }}">
            <tr>
                <td> <label>Nombre</label></td>
                <td><input type=text name="nombre" value={{ old('nombre') ?? $profesor->nombre }}></td>
            </tr>
            <tr>
                <td><label>Primer Apellido</label></td>
                <td><input type=text name="primerApellido" value={{ old('primerApellido') ?? $profesor->primerApellido }}></td>
            </tr>
            <tr>
                <td> <label>Segundo Apellido</label></td>
                <td><input type=text name="segundoApellido" value={{ old('segundoApellido') ?? $profesor->segundoApellido }}></td>
            </tr>

            <tr>
                <td> <label>Email</label></td>
                <td><input type=email name="email" value={{ old('email') ?? $profesor->email }}></td>
            </tr>

        </table>
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
    @can('admin.usuario.destroy')
        @if (Auth::user()->id !== $profesor->id || !$profesor->getRoleNames()->contains('Admin'))
            <form action="{{ route('profesores.destroy', $profesor) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">
                @csrf
                @method('DELETE')
                <input class="accion" type="submit" name="id" value="Eliminar">
            </form>
        @endif
    @endcan
    <a class="accion" href="{{ route('profesores.index') }}">Volver</a>
@endsection
