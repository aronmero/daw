<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>title</title>
</head>

<body>
    <h1>Formulario POST</h1>
    <form action="procesar_formulario.php" method="get"> 
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required></label>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" required></label>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>