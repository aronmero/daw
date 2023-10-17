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
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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

    <?php

    //$nombreUsuario = $apellidosUsuario = $emailUsuario = $fechaNac = $contrasena = $cContrasena = $foto = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nombreUsuario"]) && !empty($_POST["apellidosUsuario"]) && !empty($_POST["emailUsuario"]) && !empty($_POST["fechaNac"]) && !empty($_POST["contrasena"]) && !empty($_POST["cContrasena"])) {
            $nombreUsuario = $_POST["nombreUsuario"];
            $apellidosUsuario = $_POST["apellidosUsuario"];
            $emailUsuario = $_POST["emailUsuario"];
            $fechaNac = $_POST["fechaNac"];
            $contrasena = $_POST["contrasena"];
            $cContrasena = $_POST["cContrasena"];
            if ($contrasena == $cContrasena) {
                //Imagen

                if (!file_exists("./fotoPerfil/")) {
                    mkdir("./fotoPerfil/");
                }
                if (!file_exists("./fotoPerfil/")) {
                    mkdir("./fotoPerfil/");
                }
                if (isset($_FILES["foto"])) {
                    $tamanoMaximo = 2 * 1024 * 1024;

                    $tiposPermitidos = ['image/jpeg', 'image/png'];

                    if ($_FILES['foto']['size'] <= $tamanoMaximo && in_array($_FILES['foto']['type'], $tiposPermitidos)) {

                        $targetDir = "./fotoPerfil/";
                        $targetImagen = $targetDir . $emailUsuario . $_FILES["foto"]["name"];
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $targetImagen);
                        $imagen = $targetImagen;
                    } else {
                        $imagen =  false;
                    }
                } else {
                    $imagen =  false;
                }

                //JSON
                //Creacion de directorio para los archivos JSON fuera del servidor
                $targetDir =  "/../../../../DocumentosXAMPP/RegistroFoto/";
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0777, true); //Creacion de carpeta con permisos

                }

                //Creacion de clase con variables
                $usuario = new stdClass();
                $usuario->nombreUsuario = $nombreUsuario;
                $usuario->apellidosUsuario = $apellidosUsuario;
                $usuario->emailUsuario = $emailUsuario;
                $usuario->fechaNac = $fechaNac;
                $usuario->contrasena = $contrasena;
                $usuario->imagen = $imagen;

                //Guardado en JSON
                file_put_contents($targetDir . "$emailUsuario.json", json_encode($usuario));
                echo "Registro completado";
            } else {
                echo "Error contraseña incorrecta";
            }
        } else {
            echo "Error";
        }
    }




    ?>
</body>

</html>