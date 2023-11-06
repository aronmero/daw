<?php
//require "../../../dbinfo/loginInfo.php";
require "../loginInfo.php";
session_start();
//TODO: Obtener idCorreo profesor
if (isset($_SESSION["identificador"])) {
    $identificador = $_SESSION["identificador"];
}
try {
    $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM alumno inner join usuario where alumno.dni=usuario.dni");
    $stmt->execute();
    $datosAlumno = $stmt->fetchAll();
    $longitud = count($datosAlumno);
    $conn = "";
} catch (PDOException $e) {
    echo "Conneccion fallida: " . $e->getMessage();
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
    <a id="cerrarSesion" href='cerrarSesion.php'>Cerrar sesión</a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["fecha"])) {
            $fecha = $_POST["fecha"];

            for ($i = 0; $i < $longitud; $i++) {
                $isCorrecto = true;
                for ($j = 0; $j < 6; $j++) {
                    if (isset($_POST[$i . "checkbox" . $j])) {
                        /**Prevencion por si hay modificacion del html antes de enviar el formulario */
                        isset($_POST[$i . "sesion" . $j]) ? $numSesion = $_POST[$i . "sesion" . $j] : $isCorrecto = false;
                        isset($_POST["cialAlumno" . $i]) ? $cialAlumno = $_POST["cialAlumno" . $i] : $isCorrecto = false;
                        if ($isCorrecto == true) {
                            try {
                                //TODO: añadir el tipo de la falta al DB
                                $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `fecha`) VALUES ($cialAlumno, $identificador, $numSesion, $fecha, current_timestamp())");
                                $stmt->execute();
                                $conn = "";
                            } catch (PDOException $e) {
                                echo "Conneccion fallida: " . $e->getMessage();
                            }
                        }
                    }
                }
            }
        }
    }
    ?>
    <h1>Lista de alumnos</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div><label>Seleccionar fecha:</label><input type="date" name="fecha" required> </div>
        <div class="cabecera">
            <div>Check</div>
            <div>Sesion</div>
            <div>Nombre</div>
            <div>1º Apellido</div>
            <div>2º Apellido</div>
        </div>
        <?php
        for ($i = 0; $i < $longitud; $i++) {

            for ($j = 1; $j <= 6; $j++) {
                echo "<div>" . "<input type='checkbox' class=secretoCorto name=" . $i . "checkbox$j>" . "<input type=hidden name=cialAlumno$i value=" . $datosAlumno[$i][0] . ">" . "<input class=secretoCorto  disabled value=$j name=" . $i . "sesion$j ></input><div>" . $datosAlumno[$i][3] . " </div><div>" . $datosAlumno[$i][4] . "</div><div>" . $datosAlumno[$i][5] . " </div></div>";
            }
        }

        ?>


        <div> <input type="submit"></div>
    </form>
    <a href="index.php">Volver</a>
</body>

</html>