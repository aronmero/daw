@extends('layouts.plantilla')

@section('title', 'Editar usuario')

@section('content')
    <form action="{{ route('profesores.update', $profesor) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $profesor->id }}">
            <tr>
                <td> <label>nombre</label></td>
                <td><input type=text name="nombre" value="{{ $profesor->nombre }}"></td>
            </tr>
            <tr>
                <td><label>primerApellido</label></td>
                <td><input type=text name="primerApellido" value="{{ $profesor->primerApellido }}"></td>
            </tr>
            <tr>
                <td> <label>segundoApellido</label></td>
                <td><input type=text name="segundoApellido" value="{{ $profesor->segundoApellido }}"></td>
            </tr>

            <tr>
                <td> <label>email</label></td>
                <td><input type=email name="email" value="{{ $profesor->email }}"></td>
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
    <a class="accion" href="{{ route('profesores.index') }}">Volver</a>
@endsection
