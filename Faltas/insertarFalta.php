<?php
//require "../../../dbinfo/loginInfo.php";
session_start();
require "../loginInfo.php";
require "./logicaAUX.php";
require "./imprimirAlumnos.php";
require "./logicaFalta.php";

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
    $fechaSeleccionado = null;
}

//Obtener idCorreo profesor
if (isset($_SESSION["identificador"])) {
    $identificador = $_SESSION["identificador"];
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
        //Evitar reenvios de formulario
        unset($_SESSION["recargarPagina"]);
        header("Location: insertarFalta.php");
    } ?>
    <a id="cerrarSesion" href='cerrarSesion.php'>Cerrar sesión</a>

    <h1>Lista de alumnos</h1>
    <?php
    try {
        $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ImprimirCurso($conn, $grupoSeleccionado);
        $conn = "";
    } catch (PDOException $e) {
        echo "Conneccion fallida: " . $e->getMessage();
    }
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="selectorFecha"><label>Seleccionar fecha:</label><input type="date" name="fecha" required value=<?php if (isset($fechaSeleccionado)) {
            echo $fechaSeleccionado;
        } else {
            echo date("Y-m-d");
        } ?>> </div>
        <?php imprimirAlumnado($grupoSeleccionado) ?>
        <div class="botonesFalta"> <input type="submit" value="Crear Faltas"> <input type="submit"
                value="Modificar Faltas"></div>
    </form>
    <a href="index.php" <?php unset($_SESSION["grupoSeleccionado"]); ?>>Volver</a>
    <script src="./js/logicaListaAlumnos.js"></script>
    <script src="./js/seleccionGrupos.js"></script>
</body>

</html>