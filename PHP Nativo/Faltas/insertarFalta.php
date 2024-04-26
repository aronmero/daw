<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
};
require "./coneccionDb.php";
require "./phpAuxiliar/logicaMostrar.php";
require "./phpAuxiliar/logicaFalta.php";

if (!isset($_SESSION["identificador"])) {
    header("Location:index.php");
}
if (isset($_SESSION["tipoUsuario"]) && $_SESSION["tipoUsuario"] != "profesor") {
    header("Location:index.php");
}
$identificador = $_SESSION["identificador"];
if (isset($_POST["grupoSeleccionado"])) {
    $_SESSION["grupoSeleccionado"] = $_POST["grupoSeleccionado"];
    $grupoSeleccionado = $_SESSION["grupoSeleccionado"];
} else if (isset($_SESSION["grupoSeleccionado"])) {
    $grupoSeleccionado = $_SESSION["grupoSeleccionado"];
} else {
    $grupoSeleccionado = null;
}

if (isset($_POST["fechaSeleccionado"])) {
    $_SESSION["fechaSeleccionado"] = $_POST["fechaSeleccionado"];
    $fechaSeleccionado = $_SESSION["fechaSeleccionado"];
} else if (isset($_SESSION["fechaSeleccionado"])) {
    $fechaSeleccionado = $_SESSION["fechaSeleccionado"];
} else {
    $fechaSeleccionado = date("Y-m-d");
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW: Faltas - Insertar Faltas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php if (isset($_SESSION["recargarPagina"]) && $_SESSION["recargarPagina"] == true) {
        unset($_SESSION["recargarPagina"]);
        header("Location: insertarFalta.php");
    } ?>
    <a id="cerrarSesion" href='cerrarSesion.php'>Cerrar sesión</a>

    <h1>Lista de alumnos</h1>
    <?php
    ImprimirCurso($identificador,$grupoSeleccionado);
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="selectorFecha"><label>Seleccionar fecha:</label><input type="date" name="fecha" required value=<?php echo $fechaSeleccionado; ?>> </div>
        <?php imprimirAlumnado($grupoSeleccionado, $fechaSeleccionado) ?>

        <div class="selectorOpciones">
           
            <div class="enviarFalta"><input type="submit" value=Enviar></div>
        </div>
    </form>

    <a href="index.php">Volver</a>
    <script src="./js/logicaFaltas.js"></script>
    <script src="./js/seleccionGrupos.js"></script>
    <script src="./js/seleccionFecha.js"></script>
</body>

</html>