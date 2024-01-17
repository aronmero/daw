@extends('layouts.plantilla')

@section('title', 'Actividades.Edit')

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
    <form action="{{ route('actividades.update', $actividad) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $actividad->id }}">
            <tr>
                <td><input type=text name="lugar" value="{{ $actividad->lugar }}"></td>
            </tr>
            <tr>
                <td><input type=text name="descripcion" value="{{ $actividad->descripcion }}"></td>
            </tr>
            <tr>
                <td><input type=number name="duracion" value="{{ $actividad->duracion }}"></td>
            </tr>
            
            <tr>
                <td><input type=date name="fecha" value="{{ $actividad->fecha }}"></td>
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
    <a href="{{ route('actividades.index') }}">Volver</a>
@endsection
