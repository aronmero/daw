<?php
require "./coneccionDb.php";
require "./phpAuxiliar/logicaMostrar.php";
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
};

if (!isset($_SESSION["identificador"]) || !isset($_SESSION["tipoUsuario"])) {
  header("Location:index.php");
}

if (isset($_POST["grupoSeleccionado"])) {
  $grupoSeleccionado = $_POST["grupoSeleccionado"];
  $_SESSION["grupoSeleccionadoVista"] = $_POST["grupoSeleccionado"];
  unset($_SESSION["numPaginaVistaActual"]);
} else if (isset($_SESSION["grupoSeleccionadoVista"])) {
  $grupoSeleccionado = $_SESSION["grupoSeleccionadoVista"];
} else {
  $grupoSeleccionado = null;
}

if (isset($_POST["grupoSeleccionado"])) {
  $grupoSeleccionado = $_POST["grupoSeleccionado"];
  $_SESSION["grupoSeleccionadoVista"] = $_POST["grupoSeleccionado"];
  unset($_SESSION["numPaginaVistaActual"]);
} else if (isset($_SESSION["grupoSeleccionadoVista"])) {
  $grupoSeleccionado = $_SESSION["grupoSeleccionadoVista"];
} else {
  $grupoSeleccionado = null;
}

if (isset($_POST["numPaginaVistaActual"]) && $_POST["numPaginaVistaActual"] > 0) {
  $numPaginaActual = $_POST["numPaginaVistaActual"];
  $_SESSION["numPaginaVistaActual"] = $_POST["numPaginaVistaActual"];
} else if (!isset($_SESSION["numPaginaVistaActual"])) {
  $_SESSION["numPaginaVistaActual"] = 1;
  $numPaginaActual = $_SESSION["numPaginaVistaActual"];
} else {
  $numPaginaActual = $_SESSION["numPaginaVistaActual"];
}


$maxNumFaltas = 20;
$offset = $maxNumFaltas * (intval($_SESSION["numPaginaVistaActual"]) - 1);


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
    $cialAlumnoMostrar = $_SESSION["identificador"];
    $infoAlumno = obtenerAlumnoCial($cialAlumnoMostrar);
    echo "<div id=infoFalta><div>Cial:" . $infoAlumno[0] . "</div><div>DNI: " . $infoAlumno[1] . "</div><div>Grupo: " . $infoAlumno[2] . "</div></div>";

    $datosAlumno = obtenerFaltasAlumno($cialAlumnoMostrar , $offset, $maxNumFaltas);
    $longitud = count($datosAlumno);

    echo "<div><div class='mostrarFaltas encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div></div>";
    for ($alumno = 0; $alumno < $longitud; $alumno++) {
      echo "<div class=mostrarFaltas>" . "<div>" . $datosAlumno[$alumno][4] . "</div><div>" . $datosAlumno[$alumno][3] . " </div><div>" . $datosAlumno[$alumno][6] . "</div></div>";
    }
    echo "</div>";
    $numPaginasFaltas = ceil(obtenernNumFaltaAlumno($cialAlumnoMostrar) / $maxNumFaltas);
    imprimirBotonesNavegacion($numPaginasFaltas, $numPaginaActual);
  } else if ($_SESSION["tipoUsuario"] == "profesor") {

    $identificador = $_SESSION["identificador"];
    $infoProfesor = obtenerProfesor($identificador);

    echo "<div id=infoFalta><div>Profesor: $infoProfesor[0] $infoProfesor[1] $infoProfesor[2] </div><div>DNI: " . $infoProfesor['dni'] . "</div><div>Correo: " . $infoProfesor[5] . "</div></div>";
    ImprimirCurso($grupoSeleccionado);
    echo "<div><div class='mostrarFaltas mostrarFaltasProfesor encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div><div>" . "Alumno" . " </div><div>" . "DNI" . " </div></div>";

    $datosAlumno = obtenerFaltasAlumnoProfesor($grupoSeleccionado, $offset, $maxNumFaltas);
    $longitud = (count($datosAlumno) > $maxNumFaltas) ? $maxNumFaltas : count($datosAlumno);

    for ($alumno = 0; $alumno < $longitud; $alumno++) {
      echo "<div class='mostrarFaltas mostrarFaltasProfesor'>" . 
      "<div>" . $datosAlumno[$alumno]['dia'] . "</div><div>" . $datosAlumno[$alumno]['sesion'] . " </div><div>" .
        $datosAlumno[$alumno]['tipoFalta'] . "</div><div>" .
         $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] .
        " </div><div>" . $datosAlumno[$alumno]['dni'] . " </div></div>";
    }
    echo "</div>";
    $numPaginasFaltas = ceil(obtenernNumFaltaGrupo($grupoSeleccionado) / $maxNumFaltas);
    imprimirBotonesNavegacion($numPaginasFaltas, $numPaginaActual);
  }

  ?>
  <a href="index.php">Volver</a>
  <?php
  if ($_SESSION["tipoUsuario"] == "profesor") {
    echo "<script src='./js/seleccionGrupos.js'></script>";
  }
  ?>

  <script src="./js/seleccionPagina.js"></script>
</body>

</html>