@extends('layouts.plantilla')

@section('title', 'Categorias.Edit')

@section('style')
    <style>
        thead {
            font-weight: bold;

        }

        thead>tr {
            background-color: rgb(235 233 233) !important;
        }

        td {
            padding: 5px;
            min-width: 200px;

        }

        tr:nth-child(odd) {
            background-color: rgb(180, 180, 180);
        }

        tr:nth-child(even) {
            background-color: rgb(211, 211, 211);
        }

        table {
            border: 1px solid black;
            border-spacing: 0px;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $categoria->id }}">
            <tr>
                <td><input type=text name="nombre" value="{{ $categoria->nombre }}"></td>
            </tr>
            <tr>
                <td><input type=text name="descripcion" value="{{ $categoria->descripcion }}"></td>
            </tr>
            <tr>
                <td><input type="radio" name="activo" value=1 @if ($categoria->activo == 1) checked @endif>
                    <label>Activo</label><input type="radio" name="activo" value=0
                        @if ($categoria->activo == 0) checked @endif>
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
    <a href="{{ route('categorias.index') }}">Volver</a>
@endsection
