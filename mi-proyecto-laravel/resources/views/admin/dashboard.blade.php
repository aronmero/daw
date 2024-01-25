@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')

    <h1>Listado de profesores</h1>
    <div>
        <a href="{{ route('profesores.create') }}">Añadir Usuario</a>
    </div>
    <div>
        <table>
            <thead>
                <td>Nombre</td>
                <td>primerApellido</td>
                <td>segundoApellido</td>
                <td>email</td>
                @can('admin.actividades.edit')
                    <td></td>
                @endcan
                @can('admin.actividades.destroy')
                    <td></td>
                @endcan
            </thead>

            @forelse ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->primerApellido }}</td>
                    <td>{{ $profesor->segundoApellido }}</td>
                    <td>{{ $profesor->email }}</td>
                    @can('admin.usuario.edit')
                        <td><a href="{{ route('profesores.edit', $profesor) }}">Editar</a></td>
                    @endcan
                    <td>
                        @can('admin.usuario.destroy')
                            @if (Auth::user()->id !== $profesor->id || !$profesor->getRoleNames()->contains('Admin'))
                                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="id" value="Eliminar">
                                </form>
                            @endif
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No hay actividades</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
