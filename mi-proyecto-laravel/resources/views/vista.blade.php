<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <h1>Listado de actividades</h1>
    <table>
        <thead>
            <td>Nombre</td>
            <td>Categoria</td>
            <td>Fecha Creacion</td>
        </thead>

        @forelse ($actividades as $actividad)
            <tr>
                <td>{{ $actividad->nombre }}</td>

                <td>{{ $actividad->descripcion }}</td>

                <td>{{ $actividad->created_at }}</td>

            </tr>
        @empty
            <tr>
                <td>No hay actividades</td>
            </tr>
        @endforelse

    </table>

</body>

</html>
