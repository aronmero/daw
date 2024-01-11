@extends('layouts.plantilla')

@section('title', 'Categoria')

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
    <a href="{{ route('categorias.create') }}">Crear Categoria</a>
    <h1>Listado de categorias</h1>
    <table>
        <thead>
            <td>Ctegoria</td>
            <td>Descripcion</td>
            <td>Estado</td>
            <td>Fecha Creacion</td>
            <td></td>
            <td></td>
        </thead>
        @forelse ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>

                <td>{{ $categoria->descripcion }}</td>

                @if ($categoria->activo)
                    <td>Activo</td>
                @else
                    <td>Inactivo</td>
                @endif

                <td>{{ $categoria->created_at }}</td>
                <td><a href="{{ route('categorias.edit', $categoria) }}">Editar</a></td>
                <td>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="idCategoria" value="Eliminar">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>No hay juegos</td>
            </tr>
        @endforelse
    </table>
@endsection
