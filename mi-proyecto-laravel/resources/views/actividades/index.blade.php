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
    @can('admin.actividades.create')
        <a href="{{ route('actividades.create') }}">Crear Actividad</a>
    @endcan
    <h1>Listado de actividades</h1>
    <table>
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Duracion</td>
            <td>Fecha Creacion</td>
            @can('admin.actividades.edit')
            <td></td>
            @endcan
            @can('admin.actividades.destroy')
            <td></td>
            @endcan
        </thead>

        @forelse ($actividades as $actividad)
            <tr>
                <td>{{ $actividad->lugar }}</td>
                <td>{{ $actividad->descripcion }}</td>
                <td>{{ $actividad->duracion }}</td>
                <td>{{ $actividad->fecha }}</td>
                @can('admin.actividades.edit')
                    <td><a href="{{ route('actividades.edit', $actividad) }}">Editar</a></td>
                @endcan
                @can('admin.actividades.destroy')
                    <td>
                        <form action="{{ route('actividades.destroy', $actividad) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="idCategoria" value="Eliminar">
                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td>No hay actividades</td>
            </tr>
        @endforelse

    </table>

@endsection
