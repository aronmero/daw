<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="{{ route('categorias.store')}}" method="POST">
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
</body>

</html>
