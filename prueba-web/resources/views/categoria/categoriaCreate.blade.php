@extends('layouts.plantilla')

@section('title', 'Categorias.Create')

@section('content')
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div>
            <label>Nombre Categoria</label>
            <input type="text" name="nombre" placeholder="Categoria">
        </div>
        <div>
            <label>Descripcion</label>
            <input type="text" name="descripcion" placeholder="Descripcion">

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
    <a href="{{ route('categorias.index') }}">Volver</a>
@endsection
