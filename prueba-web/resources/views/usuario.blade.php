<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1> El nombre del usuario es: {{ $usuario }}
        @if ($apellidos)
            y el apellido es: {{ $apellidos }}
        @endif
        </h1>

</body>

</html>
