@extends('layouts.cabecera')

@section('title', 'Grupos')

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
