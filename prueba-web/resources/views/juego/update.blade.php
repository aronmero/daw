@extends('layouts.plantilla')

@section('title', 'Juegos.Update')
@section('content')
    <form action="{{ route('juego.update') }}" method="POST">
        @csrf

        <table>
            <input type="hidden" name="idJuego" value="{{ $juego->id }}">
            <tr>
                <td><input type=text name="nombre" value="{{ $juego->nombre }}"></td>
            </tr>
            <tr>

                <td><select name="idCategoria">
                        @foreach ($categorias as $key => $value)
                            <option value="{{ $value->id }}" @if ($juego->idCategoria == $value->id) selected @endif>
                                {{ $value->nombre }}
                            </option>
                        @endforeach
                </td>
            </tr>
            <tr>

                <td><input type="radio" name="activo" value=1 @if ($juego->activo == 1) checked @endif>
                    <label>Activo</label><input type="radio" name="activo" value=0
                        @if ($juego->activo == 0) checked @endif>
                    <label>Inactivo</label>
                </td>
            </tr>


        </table>
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
@endsection
