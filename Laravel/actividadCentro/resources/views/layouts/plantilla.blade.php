<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>

<body>
    <div class="all">
        @include('layouts.cabecera')

        <div class="contenido"> @yield('content')</div>

    </div>
</body>

</html>
