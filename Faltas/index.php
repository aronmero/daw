<?php
session_start();
if (!isset($_SESSION["tipoUsuario"])) {
    $_SESSION["tipoUsuario"] = null;
}
unset($_SESSION["grupoSeleccionado"]);
unset($_SESSION["fechaSeleccionado"]);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW: Faltas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
    if ($_SESSION["tipoUsuario"] == null) {
        echo "<a href=iniciarSesion.php>Iniciar Sesion</a>";
    } else {
        if ($_SESSION["tipoUsuario"] == "alumno" || $_SESSION["tipoUsuario"] == "profesor") {
            echo "<a id='cerrarSesion' href='cerrarSesion.php'>Cerrar sesión</a>";
            echo "<a href=visualizarFalta.php>Visualizar faltas</a>";
        }
        if ($_SESSION["tipoUsuario"] == "profesor") {
            echo "<a href= insertarFalta.php>Insertar Falta</a>";
        }
    }

    ?>

</body>

</html>