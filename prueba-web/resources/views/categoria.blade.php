<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
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
            <td><a href="{{ route('categorias.show',$categoria->$id) }}">Editar</a></td>
            <td><a href="">Eliminar</a></td>
        </tr>
    @empty
        <tr>
            <td>No hay juegos</td>
        </tr>
    @endforelse
</table>
</body>

</html>
