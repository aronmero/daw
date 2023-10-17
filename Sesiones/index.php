<?php
session_start();
if(empty($_SESSION["formulario"])){
    $_SESSION["formulario"]="";
}

?>
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
    <form method="post" action="sesion.php">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" value="<?php echo $_SESSION["nombreUsuario"] ?>">
        <label for="apellido">Apellido</label>
        <input name="apellido" type="text" value="<?php echo $_SESSION["apellidoUsuario"] ?>">
        <label for="numero">Numero</label>
        <input name="numero" type="number" value="<?php echo $_SESSION["numeroUsuario"] ?>">
        <input type="submit">
    </form>
    <div><?php echo $_SESSION["formulario"] ?></div>
</body>

</html>