@extends('layouts.plantilla')

@section('title', 'Editar grupo')

@section('content')
<h2>Editar grupo</h2>
    <form action="{{ route('grupos.update', $grupo) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <input type="hidden" name="id" value="{{ $grupo->id }}">
            <tr><td><label>Nombre del grupo</label></td>
                <td><input type=text name="nombre" value={{ old('nombre') ?? $grupo->nombre }}></td>
            </tr>
        </table>
        <div>
            <input class="accion" type="submit" value="Enviar">
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
    <a class="accion" href="{{ route('grupos.index') }}">Volver</a>
@endsection
