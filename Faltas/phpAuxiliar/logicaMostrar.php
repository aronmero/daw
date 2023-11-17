<?php


function ImprimirCurso($identificacion,$grupoSeleccionado)
{
  $infoCursos = obtenerCursoImpartido($identificacion);
  echo "<div class=selectorCurso>";
  for ($i = 0; $i < count($infoCursos); $i++) {
    $botonMostrar = ($grupoSeleccionado == $infoCursos[$i]['idCurso']) ? "<div class=seleccionado id=" . $infoCursos[$i]['idCurso'] . ">" . $infoCursos[$i]['nombre'] . "</div>" : "<div id=" . $infoCursos[$i]['idCurso'] . ">" . $infoCursos[$i]['nombre'] . "</div>";
    echo $botonMostrar;
  }
  echo "</div>";
}


function imprimirAccionFalta($accionFaltaSeleccionada)
{
  $accionesFalta = array("crearFalta" => "Crear faltas", "modificarFalta" => "Modificar faltas");
  echo "<div class=selectorFalta id=selectorFalta>";
  foreach ($accionesFalta as $idAccion => $textoAccion) {
    $botonMostrar = ($idAccion == $accionFaltaSeleccionada) ? "<div  class=seleccionado><input id=$idAccion type=hidden name=faltaSeleccionado value=$idAccion>$textoAccion</div>" : "<div><input id=$idAccion type=hidden>$textoAccion</div>";
    echo $botonMostrar;
  }
  echo "</div>";
}

function imprimirAlumnado($grupoSeleccionado, $fecha)
{
  echo '<div class="encabezado"><div>Check</div><div>Sesion</div><div>Nombre y apellidos</div><div>Tipo de falta</div></div>';
  $datosAlumno = obtenerAlumnoGrupo($grupoSeleccionado);
  $longitud = count($datosAlumno);
  $_SESSION["numAlumnosInserccion"] = $longitud;
  for ($alumno = 0; $alumno < $longitud; $alumno++) {
    if (!isset($fecha)) {
      $fecha = date("Y-m-d");
    }
    $cialAlumnoMostrar = $datosAlumno[$alumno]['cial'];
    $faltas = obtenerFaltasFecha($cialAlumnoMostrar, $fecha,$grupoSeleccionado);

    $numFaltas = count($faltas);
    $tiposFalta = ["Falta sin Justificar", "Falta Justificada"];
    echo "<div class=datosAlumno>";
    echo "<div class=navAlumno><input type=checkbox class=secretoCorto>" . "<div class=secretoCorto></div><div>" .
      $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] . "</div>"
      . "<select>";
      echo "<option value=->-</option>";
    for ($falta = 0; $falta < count($tiposFalta); $falta++) {
      echo "<option value='$tiposFalta[$falta]'>$tiposFalta[$falta]</option>";
    }
    echo "</select><div><input type=checkbox class=botonEliminar>Eliminar</div></div>";

    for ($sesion = 1; $sesion <= 6; $sesion++) {
      $checked = "";
      $existeFalta = "";
      $idfalta = "";

      $tipoFalta = $tiposFalta[0];
      for ($falta = 0; $falta < $numFaltas; $falta++) {
        if ($faltas[$falta]['sesion'] == $sesion) {
          $existeFalta = "faltaExistente";
          // $checked = "checked";

          $idfalta = $faltas[$falta]['idfalta'];
          $tipoFalta = $faltas[$falta]['tipoFalta'];
          break;
        }
      }
      $nombreCheck = $alumno . "checkbox$sesion";

      $botonEliminarFalta = $existeFalta != "" ? "<input type=checkbox class=botonEliminar name=" . $alumno . "eliminarFalta$sesion>" : "";
      echo "<div class=$existeFalta >" . "<input type='checkbox'  " . "" . "class=secretoCorto name='$nombreCheck'  $checked >";

      echo "<input type=hidden name=" . $alumno . "faltaExistente$sesion value=" . $idfalta . ">";

      echo "<input type=hidden name=cialAlumno$alumno value=" . $datosAlumno[$alumno]['cial'] . ">" .
        "<div class=secretoCorto>$sesion</div><p>" . $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] .
        " </p><div><select name=" . $alumno . "tipoFalta" . $sesion . ">";
      for ($falta = 0; $falta < count($tiposFalta); $falta++) {
        echo ($tipoFalta == $tiposFalta[$falta]) ? "<option value='$tiposFalta[$falta]' selected>$tiposFalta[$falta]</option>" : " <option value='$tiposFalta[$falta]'>$tiposFalta[$falta]</option>";
      }

      echo "</select></div><div class=secretoCorto>$botonEliminarFalta</div></div>";
    }

    echo "</div>";
  }
}

function imprimirBotonesNavegacion($numPaginasFaltas, $numPaginaActual)
{
  echo "<div class=navPaginas>";
  if ($numPaginasFaltas > 1) {
    if ( $numPaginaActual == 1) {
      echo "<div numpagina=" .  $numPaginaActual . " class=botonPagina>Anterior</div>";
    } else {
      echo "<div numpagina=" .  $numPaginaActual- 1 . " class=botonPagina>Anterior</div>";
    }

    for ($index =  $numPaginaActual - 5; $index <  $numPaginaActual; $index++) {
      if ($index > 0) {
        echo "<div numpagina=$index class=botonPagina>" . $index . "</div>";
      }
    }
    echo "<div numpagina=$_SESSION[numPaginaVistaActual] class='botonPagina seleccionado'>" .  $numPaginaActual . "</div>";;
    for ($index =  $numPaginaActual + 1; $index <  $numPaginaActual + 5; $index++) {
      if ($numPaginasFaltas >= $index) {
        echo "<div numpagina=$index class=botonPagina>" . $index . "</div>";
      }
    }
    if ( $numPaginaActual == $numPaginasFaltas) {
      echo "<div numpagina=" .  $numPaginaActual . " class=botonPagina>Siguiente</div>";
    } else {
      echo "<div numpagina=" .  $numPaginaActual + 1 . " class=botonPagina>Siguiente</div>";
    }
    echo "</div>";
  }
}