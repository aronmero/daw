@extends('layouts.plantilla')

@section('title', 'Login')

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
<a href="{{ route('home') }}">Inicio</a>
<a href="{{ route('actividades.create') }}">Crear Actividad</a>
    <h1>Listado de actividades</h1>
    <table>
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Duracion</td>
            <td>Fecha Creacion</td>
            <td></td>
            <td></td>
        </thead>

        @forelse ($actividades as $actividad)
            <tr>
                <td>{{ $actividad->lugar }}</td>
                <td>{{ $actividad->descripcion }}</td>
                <td>{{ $actividad->duracion }}</td>
                <td>{{ $actividad->fecha }}</td>
                <td><a href="{{ route('actividades.edit', $actividad) }}">Editar</a></td>
               <td> <form action="{{ route('actividades.destroy', $actividad) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="idCategoria" value="Eliminar">
                </form></td>
            </tr>
        @empty
            <tr>
                <td>No hay actividades</td>
            </tr>
        @endforelse

    </table>

@endsection
