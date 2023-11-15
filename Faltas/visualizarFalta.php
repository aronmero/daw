<?php
require "./coneccionDb.php";
require "./logicaAUX.php";
session_start();
if (isset($_POST["grupoSeleccionado"])) {
  $grupoSeleccionado = $_POST["grupoSeleccionado"];
} else {
  $grupoSeleccionado = null;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>DAW: Faltas - Visualizar faltas</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
  <a id='cerrarSesion' href='cerrarSesion.php'>Cerrar sesión</a>


  <?php
  if ($_SESSION["tipoUsuario"] == "alumno") {
    $infoAlumno = obtenerAlumnoCial();
    echo "<div id=infoFalta><div>Cial:" . $infoAlumno[0] . "</div><div>DNI: " . $infoAlumno[1] . "</div><div>Grupo: " . $infoAlumno[2] . "</div></div>";
    $datosAlumno = obtenerFaltasAlumno($cialAlumnoMostrar);
    $longitud = count($datosAlumno);

    echo "<div><div class='mostrarFaltas encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div></div>";
    for ($alumno = 0; $alumno < $longitud; $alumno++) {
      echo "<div class=mostrarFaltas>" . "<div>" . $datosAlumno[$alumno][4] . "</div><div>" . $datosAlumno[$alumno][3] . " </div><div>" . $datosAlumno[$alumno][6] . "</div></div>";
    }
    echo "</div>";

  } else if ($_SESSION["tipoUsuario"] == "profesor") {

    $identificador = $_SESSION["identificador"];
    $infoProfesor = obtenerProfesor($identificador);

    echo "<div id=infoFalta><div>Profesor: $infoProfesor[0] $infoProfesor[1] $infoProfesor[2] </div><div>DNI: " . $infoProfesor['dni'] . "</div><div>Correo: " . $infoProfesor[5] . "</div></div>";
    ImprimirCurso($grupoSeleccionado);
    echo "<div><div class='mostrarFaltas mostrarFaltasProfesor encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div><div>" . "Alumno" . " </div><div>" . "DNI" . " </div></div>";

    $datosAlumno = obtenerFaltasAlumnoProfesor($grupoSeleccionado);
    $longitud = count($datosAlumno);

    for ($alumno = 0; $alumno < $longitud; $alumno++) {
      echo "<div class='mostrarFaltas mostrarFaltasProfesor'>" . "<div>" . $datosAlumno[$alumno]['dia'] . "</div><div>" . $datosAlumno[$alumno]['sesion'] . " </div><div>" .
        $datosAlumno[$alumno]['tipoFalta'] . "</div><div>" . $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] .
        " </div><div>" . $datosAlumno[$alumno]['dni'] . " </div></div>";
    }
    echo "</div>";
  }

  ?>
  <a href="index.php">Volver</a>
  <script src="./js/seleccionGrupos.js"></script>
</body>

</html>