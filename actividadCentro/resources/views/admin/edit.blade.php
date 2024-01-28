@extends('layouts.plantilla')

@section('title', 'Editar usuario')

@section('content')
    <h2>Editar profesor</h2>
    <div class="profesores">
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
                    <td><input type=text name="primerApellido"
                            value={{ old('primerApellido') ?? $profesor->primerApellido }}>
                    </td>
                </tr>
                <tr>
                    <td> <label>Segundo Apellido</label></td>
                    <td><input type=text name="segundoApellido"
                            value={{ old('segundoApellido') ?? $profesor->segundoApellido }}>
                    </td>
                </tr>

                <tr>
                    <td> <label>Email</label></td>
                    <td><input type=email name="email" value={{ old('email') ?? $profesor->email }}></td>
                </tr>
                <tr>
                    <td colspan="2"> <input class="accion" type="submit" value="Actualizar profesor"></td>
                </tr>

            </table>
        </form>
        <h3>Contraseña</h3>
        <form action="{{ route('profesores.updatePassword', $profesor) }}" method="POST" class="passwordForm">
            @csrf
            @method('PUT')
            <div>
                <label>Contraseña Actual:</label>
                <input type="password" name="password_actual" required>
                @error('password_actual')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label>Nueva Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Confirmar Nueva Contraseña:</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <div>
                <button type="submit" class="accion">Actualizar Contraseña</button>
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
    </div>
    <a class="accion" href="{{ route('profesores.index') }}">Volver</a>
@endsection
