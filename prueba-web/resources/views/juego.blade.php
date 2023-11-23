<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if (isset($juego))
        <h1>Listado de juegos</h1>
        <h2>El juego elegido es: {{ $juego }} de la categoria : {{ $categoria }}</h2>
    @endif

    @if (isset($listaJuegos))
        <h1>Listado de juegos de la categoria</h1>
        @forelse ($listaJuegos as $juego)
            <li>{{ $juego }}</li>
        @empty
            <li>No hay juegos</li>
        @endforelse
    @endif

</body>

</html>
