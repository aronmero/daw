<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2> hola estas en el login</h2>
    <h3> Lista de usuarios:</h3>
    @forelse ($usuarios as $usuario)
        <li>{{ $usuario }}</li>
    @empty
    <li>No hay nadie</li>
@endforelse
</body>

</html>
