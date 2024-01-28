@extends('layouts.plantilla')

@section('title', 'Grupos')

@section('content')
    <h1>Listado de grupos</h1>
    @can('admin.grupo.create')
        <a class="accion" href="{{ route('grupos.create') }}">Crear Grupo</a>
    @endcan
    <table>
        <thead>
            <td>Nombre</td>
            @canany(['admin.grupo.edit', 'admin.grupo.destroy', 'admin.grupo.show'])
                <td colspan="3">Acciones</td>
            @endcanany
        </thead>

        @forelse ($grupos as $grupo)
            <tr>
                <td>{{ $grupo->nombre }}</td>
                @can('admin.grupo.show')
                    <td><a class="accion" href="{{ route('grupos.show', $grupo) }}">Ver</a></td>
                @endcan
                @can('admin.grupo.edit')
                    <td><a class="accion" href="{{ route('grupos.edit', $grupo) }}">Editar</a></td>
                @endcan
                @can('admin.grupo.destroy')
                    <td>
                        <form action="{{ route('grupos.destroy', $grupo) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar este grupo?');">
                            @csrf
                            @method('DELETE')
                            <input class="accion" type="submit" name="idCategoria" value="Eliminar">
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
