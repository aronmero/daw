@extends('layouts.plantilla')

@section('title', 'Login')

@section('style')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }

        .contenedor {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        tr:nth-child(odd),
        .carta:nth-child(odd) {
            background-color: #ffd7b3;
        }

        tr:nth-child(even),
        .carta:nth-child(even) {
            background-color: #f7b57c;
        }

        tr td:nth-child(1) {
            font-size: 16px;
        }

        td {
            font-size: 14px;
            padding: 10px 15px;
            border: 1px solid black;
            border-radius: 5px;
        }

        th {
            padding-left: 10px;
            text-align: start;
        }

        table {
            padding: 10px;
            border: 1px solid black;
            border-radius: 15px;
            border-spacing: 10px;
            width: 1100px;
        }

        button {
            font-size: 16px;
            border: 1px solid black;
            border-radius: 10px;
            padding: 8px 15px;
            background-color: rgb(201, 201, 201);
            cursor: pointer;
        }

        button.seleccionado {
            font-weight: 600;
            background-color: rgb(228, 183, 86);
        }

        .encabezado {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .encabezado>div {
            width: 100%;
            max-width: 1000px;
            display: flex;
        }

        .encabezado>div> :nth-child(1) {
            display: flex;
            justify-content: space-evenly;
            width: 90%;
        }

        .selectorFiltro {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .selectorFiltro img {
            width: 30px;
            height: 30px;
        }

        .contenedorCartas {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            width: 1100px;
        }

        .carta {
            height: 240px;
            box-sizing: border-box;
            padding: 10px 15px;
            border: 1px solid black;
            border-radius: 5px;
            width: 200px;
        }

        .carta>div {
            padding: 3px;
        }

        .carta .lugar {
            font-weight: 700;
        }

        .filtros {
            height: 0px;
            opacity: 0;
            box-sizing: border-box;
            visibility: hidden;
            padding: 30px;
            display: flex;
            justify-content: center;

        }

        .filtros form {
            width: 800px;
            display: flex;
            border: 1px solid black;
            padding: 20px;
            padding-bottom: 25px;
            border-radius: 15px;
            justify-content: space-around;
        }

        .filtros form div {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-top: 5px;
            width: 150px;
            border: 1px solid grey;
            padding: 3px 7px;
            border-radius: 5px;
        }

        .filtros.activo {
            /*TODO: transicion out*/
            transition: height 0.3s, opacity 0.3s ease 0.3s;
            opacity: 1;
            visibility: visible;
            height: 170px;
        }
    </style>
@endsection

@section('content')
    <a href="{{ route('home') }}">Inicio</a>
    @can('admin.actividades.create')
        <a href="{{ route('actividades.create') }}">Crear Actividad</a>
    @endcan
    <h1>Listado de actividades</h1>
    <div class="contenedor">
        <div class="contenedorCartas">
            @forelse ($actividades as $actividad)
                <div class="carta">
                    <div>{{ $actividad->lugar }}</div>
                    <div>{{ $actividad->fecha }}</div>
                    <div>{{ $actividad->duracion }}</div>

                    @can('admin.actividades.edit')
                        <div><a href="{{ route('actividades.edit', $actividad) }}">Editar</a></div>
                    </div>
                @endcan
            @empty

                No hay actividades
            @endforelse
        </div>
    </div>

@endsection
