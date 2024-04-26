<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <form method="post" action="cookie.php">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text">
        <label for="apellido">Apellido</label>
        <input name="apellido" type="text">
        <label for="numero">Numero</label>
        <input name="numero" type="number">
        <input type="submit">
    </form>
    <div><?php if (isset($_COOKIE["user"])) {
                echo "Bienvenido " . $_COOKIE["user"]."<br>";
            }
            if(count($_COOKIE)>0){
                echo "Las cookies estan activadas";
            }
            ?></div>
</body>

</html>