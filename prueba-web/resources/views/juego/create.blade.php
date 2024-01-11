@extends('layouts.plantilla')

@section('title', 'Juegos.Create')
@section('content')
    <form action="{{ route('juegosCreate') }}" method="POST">
        @csrf
        <div>
            <label>Nombre juego</label>
            <input type="text" name="nombre" placeholder="Juego">
        </div>
        <div>
            <label>Categoria juego</label>
            <select name="idCategoria" id="">
                @foreach ($categorias as $categoria)
                    <option value={{ $categoria->id }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>

        </div>
        <div>
            <input type="submit" value="Enviar">
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
@endsection
