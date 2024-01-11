@extends('layouts.plantilla')

@section('title', 'Juegos')

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
    @if (isset($juego))
        <h1>Listado de juegos</h1>
        <h2>El juego elegido es: {{ $juego }} de la categoria : {{ $categoria }}</h2>
    @endif

    @if (isset($juegoCategoria))
        <h1>Listado de juegos de la categoria</h1>
        <table>
            <thead>
                <td>Nombre</td>
                <td>Categoria</td>
                <td>Estado</td>
                <td>Fecha Creacion</td>
                <td></td>
                <td></td>
            </thead>
            @forelse ($juegoCategoria as $juego)
                <tr>
                    <td>{{ $juego->nombre }}</td>

                    <td>{{ $juego->categoria }}</td>

                    @if ($juego->activo)
                        <td>Activo</td>
                    @else
                        <td>Inactivo</td>
                    @endif

                    <td>{{ $juego->created_at }}</td>
                    <td><a href="{{ route('juegoView', $juego->id) }}">Editar</a></td>
                    <td><a href="{{ route('juegoEliminar', $juego->id) }}">Eliminar</a></td>
                </tr>
            @empty
                <tr>
                    <td>No hay juegos</td>
                </tr>
            @endforelse
        </table>
    @endif
@endsection
