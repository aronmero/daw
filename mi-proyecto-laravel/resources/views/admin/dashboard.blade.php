@extends('layouts.plantilla')

@section('title', 'Home')

@section('content')

    <h1>
        Listado de profesores</h1>
    <div>
        <a class="accion" href="{{ route('profesores.create') }}">Añadir Usuario</a>
    </div>
    <div>
        <table>
            <thead>
                <td>Nombre</td>
                <td>Primer Apellido</td>
                <td>Segundo Apellido</td>
                <td>Email</td>
                @canany(['admin.actividades.edit', 'admin.actividades.destroy', 'admin.actividades.show'])
                    <td colspan="3">Acciones</td>
                @endcanany
            </thead>

            @forelse ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->primerApellido }}</td>
                    <td>{{ $profesor->segundoApellido }}</td>
                    <td>{{ $profesor->email }}</td>
                    @can('admin.usuario.show')
                        <td><a class="accion" href="{{ route('profesores.show', $profesor) }}">Ver</a></td>
                    @endcan
                    @can('admin.usuario.edit')
                        <td><a class="accion" href="{{ route('profesores.edit', $profesor) }}">Editar</a></td>
                    @endcan

                    @can('admin.usuario.destroy')
                        <td>
                            @if (Auth::user()->id !== $profesor->id || !$profesor->getRoleNames()->contains('Admin'))
                                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">
                                    @csrf
                                    @method('DELETE')
                                    <input class="accion" type="submit" name="id" value="Eliminar">
                                </form>
                            @endif
                        </td>
                    @endcan

                </tr>
            @empty
                <tr>
                    <td>No hay actividades</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
