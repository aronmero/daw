<?php
//require "../../../dbinfo/loginInfo.php";
require "./coneccionDb.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
};

if (!isset($_SESSION["tipoUsuario"])) {
    $_SESSION["tipoUsuario"] = null;
} else {
    header("Location:index.php");
}

if (!isset($_SESSION["identificador"])) {
    $_SESSION["identificador"] = null;
} else {
    header("Location:index.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW:Faltas - Inicio sesion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <form class="inicioSesion" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div><label>Dni: </label><input type="text" name=dni required></div>
        <div><label>Contraseña: </label><input type="password" name=contrasena required></div>
        <div><input type="submit"></div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST["dni"];
        $contrasena = $_POST["contrasena"];

        $contrasenaDB = obtenerContrasena($dni);
        //Todo: Cambiar metodo a HASH
        if ($contrasenaDB[0] == $contrasena) {

            $datosProfesor = obtenerProfesorDni($dni);
            if (isset($datosProfesor[0])) {
                $_SESSION["tipoUsuario"] = "profesor";
                $_SESSION["identificador"] = $datosProfesor[0];
                header('Location: index.php');
            } else {
                $datosAlumno = obtenerAlumnoDni($dni);

                $_SESSION["tipoUsuario"] = "alumno";
                $_SESSION["identificador"] = $datosAlumno[0];
                header('Location: index.php');
            }
        }
    }

    ?>
    <a href="index.php">Volver</a>
</body>

</html>