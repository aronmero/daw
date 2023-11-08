<?php
//require "../../../dbinfo/loginInfo.php";
require "../loginInfo.php";
session_start();
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
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Evitar reenvios de formulario
        header("Location: insertarFalta.php");
    } ?>
    <a id="cerrarSesion" href='cerrarSesion.php'>Cerrar sesión</a>

    <h1>Lista de alumnos</h1>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="selectorFecha"><label>Seleccionar fecha:</label><input type="date" name="fecha" required value=<?php echo date("Y-m-d") ?>> </div>
        <?php include "./imprimirAlumnos.php" ?>
        <?php include "./logicaFalta.php" ?>
        <div class="botonesFalta"> <input type="submit" value="Crear Faltas"> <input type="submit" value="Modificar Faltas"></div>
    </form>
    <a href="index.php">Volver</a>
    <script src="./js/logicaListaAlumnos.js"></script>
    
</body>

</html>