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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label for="emailUsuario">email*</label>
            <input type="email" name="emailUsuario" id="emailUsuario">
            <label for="contrasena">Contraseña*</label>
            <input type="password" name="contrasena" id="contrasena">
            <input type="submit" value="Enviar">
        </form>

    </div>
    <a href="index.html">Volver</a><br>
   
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["emailUsuario"])  && !empty($_POST["contrasena"])) {
            $emailUsuario = $_POST["emailUsuario"];
            $contrasena = $_POST["contrasena"];

            //JSON
            $targetDir =  "../DocumentosXAMPP/RegistroFoto/";
            $datosUsuario = file_get_contents($targetDir . "$emailUsuario.json", true);
            $usuario = json_decode($datosUsuario);
            if ($usuario != null) {
                if ($usuario->emailUsuario == $emailUsuario && $usuario->contrasena == $contrasena) {
                    foreach ($usuario as $variable => $clave) {
                        if ($variable != "contrasena" && $variable!="imagen") {
                            echo $clave . "<br>";
                        }
                    }
                    $imagenPerfil=$usuario->imagen;
                    if ($imagenPerfil != false) {
                        echo  "<img src='$imagenPerfil'>;";
                    }else{
                        echo "No se ha subido imagen";
                    }
                }
            }

            $usuario = null;
        } else {
            echo "Error contraseña incorrecta";
        }
    } else {
    }

    ?>
</body>

</html>