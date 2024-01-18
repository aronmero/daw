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
    @can('admin.grupo.create')
        <a href="{{ route('grupos.create') }}">Crear Grupo</a>
    @endcan
    <h1>Listado de actividades</h1>
    <table>
        <thead>
            <td>Nombre</td>
            @can('admin.grupo.edit')
            <td></td>
            @endcan
            @can('admin.grupo.destroy')
            <td></td>
            @endcan
        </thead>

        @forelse ($grupos as $grupo)
            <tr>
                <td>{{ $grupo->nombre }}</td>
                @can('admin.grupo.edit')
                    <td><a href="{{ route('grupos.edit', $grupo) }}">Editar</a></td>
                @endcan
                @can('admin.grupo.destroy')
                    <td>
                        <form action="{{ route('grupos.destroy', $grupo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="idCategoria" value="Eliminar">
                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td>No hay grupos</td>
            </tr>
        @endforelse

    </table>

@endsection
