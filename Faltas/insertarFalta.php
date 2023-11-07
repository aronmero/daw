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
    $stmt = $conn->prepare("SELECT * FROM alumno  inner join usuario on alumno.dni=usuario.dni");
    $stmt->execute();
    $numAlumnos = $stmt->fetchAll();
    $longitud = count($numAlumnos);

    $stmt = $conn->prepare("SELECT * FROM alumno  inner join usuario on alumno.dni=usuario.dni");
    $stmt->execute();
    $datosAlumno = $stmt->fetchAll();
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
    <script src="./js/logica.js"></script>
</head>

<body>
    <a id="cerrarSesion" href='cerrarSesion.php'>Cerrar sesión</a>

    <h1>Lista de alumnos</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="selectorFecha"><label>Seleccionar fecha:</label><input type="date" name="fecha" required value=<?php echo date("Y-m-d") ?>> </div>
        <div class="encabezado">
            <div>Check</div>
            <div>Sesion</div>
            <div>Nombre y apellidos</div>
            <div>Tipo de falta</div>
            <div>Motivo</div>
        </div>
        <?php
        for ($i = 0; $i < $longitud; $i++) {
            try {
                //TODO: Al cambiar la fecha que se actualice el display
                if (!isset($fecha)) {
                    $fecha = date("Y-m-d");
                }
                $cialAlumnoMostrar = $datosAlumno[$i][0];
                $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM falta  where cial=:cial and dia=:dia");
                $stmt->bindParam(':cial', $cialAlumnoMostrar);
                $stmt->bindParam(':dia', $fecha);
                $stmt->execute();
                $faltas = $stmt->fetchAll();
                $numFaltas = count($faltas);

                echo "<div class=datosAlumno>";
                echo "<div class=navAlumno><input type=checkbox> " . $datosAlumno[$i][3] . " " . $datosAlumno[$i][4] . " " . $datosAlumno[$i][5] . "</div>";

                for ($j = 1; $j <= 6; $j++) {
                    $checked = "";
                    $existeFalta = "";
                    $idfalta = "";
                    for ($w = 0; $w < $numFaltas; $w++) {
                        if ($faltas[$w][3] == $j) {
                            $existeFalta = "faltaExistente";
                            $checked = "checked";
                            $idfalta = $faltas[$w][0];
                            break;
                        }
                    }
                    $nombreCheck = $i . "checkbox$j";
                    echo "<div class=$existeFalta>" . "<input type='checkbox' " . "" . "class=secretoCorto name='$nombreCheck'  $checked >";

                    echo "<input type=hidden name=" . $j . "faltaExistente$i value=" . $idfalta . ">";

                    echo "<input type=hidden name=cialAlumno$i value=" . $datosAlumno[$i][0] . ">" .
                        "<div class=secretoCorto>$j</div><p>" . $datosAlumno[$i][3] . " " . $datosAlumno[$i][4] . " " . $datosAlumno[$i][5] . " </p><div></div><div></div></div>";
                }
            } catch (PDOException $e) {
                echo "Conneccion fallida: " . $e->getMessage();
            }
            echo "</div>";
        }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($i = 0; $i < $longitud; $i++) {
                $isCorrecto = true;
                for ($j = 1; $j <= 6; $j++) {
                    if (isset($_POST[$i . "checkbox" . $j]) == true) {
                        /**Prevencion por si hay modificacion del html antes de enviar el formulario */
                        isset($_POST["cialAlumno" . $i]) ? $cialAlumno = $_POST["cialAlumno" . $i] : $isCorrecto = false;
                        if ($isCorrecto == true) {
                            $numSesion = $j;
                            $nameFaltaExistente = $j . "faltaExistente$i ";
                            if ($_POST["$nameFaltaExistente"]) {
                                //TODO: Update falta
                            } else {
                                //Inserccion falta
                                try {
                                    //TODO: añadir el tipo de la falta al DB
                                    $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("INSERT INTO `falta` ( `cial`, `idCorreo`, `sesion`, `dia`, `fecha`) VALUES (:cialAlumno, :identificador, :numSesion, :fecha, current_timestamp())");
                                    $stmt->bindParam(':cialAlumno', $cialAlumno);
                                    $stmt->bindParam(':identificador', $identificador);
                                    $stmt->bindParam(':numSesion', $numSesion);
                                    $stmt->bindParam(':fecha', $fecha);
                                    $stmt->execute();
                                    $conn = "";

                                    //Evitar repeticion de peticion de formulario al refrescar
                                    header("Location: insertarFalta.php");
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

        <div class="botonesFalta"> <input type="submit" value="Crear Faltas"> <input type="submit" value="Modificar Faltas"></div>

    </form>
    <a href="index.php">Volver</a>
</body>

</html>