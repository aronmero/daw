@extends('layouts.plantilla')

@section('title', 'Editar grupo')

@section('content')
    <form action="{{ route('grupos.update', $grupo) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $grupo->id }}">
            <tr>
                <td><input type=text name="nombre" value="{{ $grupo->nombre }}"></td>
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
    <a class="accion" href="{{ route('grupos.index') }}">Volver</a>
@endsection
