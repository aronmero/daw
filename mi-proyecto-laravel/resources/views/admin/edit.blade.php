@extends('layouts.cabecera')

@section('title', 'Editar usuario')

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
