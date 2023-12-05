<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('juegosUpdate') }}" method="POST">
        @csrf

        <table>
            <tr>
                <td><input type=text name="nombreJuego" value="{{ $juego->nombre }}"></td>
            </tr>
            <tr>

                <td><select>
                        @foreach ($categorias as $key => $value)
                            <option value="{{ $value->id }}" @if ($juego->idCategoria == $value->id) selected @endif>
                                {{ $value->nombre }}</option>
                        @endforeach
                </td>
            </tr>
            <tr>

                <td><input type="radio" name="activo" value=1 @if ($juego->activo == 1) checked @endif>
                    <label>Activo</label><input type="radio"name="activo" value=0
                        @if ($juego->activo == 0) checked @endif>
                    <label>Inactivo</label>
                </td>
            </tr>


        </table>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>

</html>
