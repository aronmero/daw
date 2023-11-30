<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('juegosCreate') }}" method="POST">
        @csrf
        <div>
            <label>Nombre juego</label>
            <input type="text" name="NombreJuego" placeholder="Juego">
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
</body>

</html>
