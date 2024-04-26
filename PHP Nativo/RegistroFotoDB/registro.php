<?php
session_start();
if(empty($_SESSION["registroMensaje"])){
    $_SESSION["registroMensaje"]="";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
</head>

<body>
    <div>
        <form method="post" enctype="multipart/form-data" action="registroLogica.php">
            <label for="nombreUsuario">Nombre*</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario">
            <label for="apellidosUsuario">Apellidos*</label>
            <input type="text" name="apellidosUsuario" id="apellidosUsuario">
            <label for="emailUsuario">email*</label>
            <input type="email" name="emailUsuario" id="emailUsuario">
            <label for="fechaNac">Fecha nacimiento*</label>
            <input type="date" name="fechaNac" id="fechaNac">
            <label for="contrasena">Contraseña*</label>
            <input type="password" name="contrasena" id="contrasena">
            <label for="cContrasena">Comprobar Contraseña*</label>
            <input type="password" name="cContrasena" id="cContrasena">
            <label for="foto">Fotografia</label>
            <input type="file" name="foto" id="foto">
            <input type="submit" value="Enviar">
        </form>

    </div>
    <a href="index.html">Volver</a><br>

    <div><?php print $_SESSION["registroMensaje"]?></div>
 
</body>

</html>