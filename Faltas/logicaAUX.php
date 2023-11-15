<?php
require "../loginInfo.php";

function ImprimirCurso($grupoSeleccionado)
{
  $infoCursos = obtenerCurso();
  echo "<div class=selectorCurso>";

  for ($i = 0; $i < count($infoCursos); $i++) {

    $botonMostrar = ($grupoSeleccionado == $infoCursos[$i][1]) ? "<div class=seleccionado id=" . $infoCursos[$i][1] . ">" . $infoCursos[$i][0] . "</div>" : "<div id=" . $infoCursos[$i][1] . ">" . $infoCursos[$i][0] . "</div>";
    echo $botonMostrar;
  }
  echo "</div>";

}


function imprimirAccionFalta($accionFaltaSeleccionada)
{
  $accionesFalta = array("crearFalta" => "Crear faltas", "modificarFalta" => "Modificar faltas");
  echo "<div class=selectorFalta>";
  foreach ($accionesFalta as $idAccion => $textoAccion) {
    $botonMostrar = ($idAccion == $accionFaltaSeleccionada) ? "<div  class=seleccionado>$textoAccion<input id=$idAccion type=hidden></div>" : "<div><input id=$idAccion type=hidden>$textoAccion</div>";
    echo $botonMostrar;
  }
  echo "</div>";
}

function imprimirAlumnado($grupoSeleccionado, $fecha): void
{
  require "../loginInfo.php";

  echo '<div class="encabezado"><div>Check</div><div>Sesion</div><div>Nombre y apellidos</div><div>Tipo de falta</div></div>';
  $datosAlumno = obtenerAlumnoGrupo($grupoSeleccionado);
  $longitud = count($datosAlumno);
  $_SESSION["numAlumnosInserccion"] = $longitud;
  for ($alumno = 0; $alumno < $longitud; $alumno++) {
    if (!isset($fecha)) {
      $fecha = date("Y-m-d");
    }
    $cialAlumnoMostrar = $datosAlumno[$alumno]['cial'];
    $faltas = obtenerFaltasFecha($cialAlumnoMostrar, $fecha);
    $numFaltas = count($faltas);
    $tiposFalta = ["Falta sin Justificar", "Falta Justificada"];
    echo "<div class=datosAlumno>";
    echo "<div class=navAlumno><input type=checkbox class=secretoCorto>" . "<div class=secretoCorto></div><div>" .
      $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] . "</div>"
      . "<select>";
    for ($falta = 0; $falta < count($tiposFalta); $falta++) {
      echo "<option value='$tiposFalta[$falta]'>$tiposFalta[$falta]</option>";
    }
    echo "</select><div>Eliminar</div></div>";

    //Array con tipos de falta, como no hay tipos definidos en la base de datos

    for ($sesion = 1; $sesion <= 6; $sesion++) {
      $checked = "";
      $existeFalta = "";
      $idfalta = "";
      $readonly = "";
      $tipoFalta = $tiposFalta[0];
      for ($falta = 0; $falta < $numFaltas; $falta++) {
        if ($faltas[$falta]['sesion'] == $sesion) {
          $existeFalta = "faltaExistente";
          // $checked = "checked";
          $readonly = "read-only";
          $idfalta = $faltas[$falta]['idfalta'];
          $tipoFalta = $faltas[$falta]['tipoFalta'];
          break;
        }
      }
      $nombreCheck = $alumno . "checkbox$sesion";

      $botonEliminarFalta = $existeFalta != "" ? "<input type=checkbox name=" . $alumno . "eliminarFalta$sesion>" : "";
      echo "<div class=$existeFalta>" . "<input type='checkbox' $readonly " . "" . "class=secretoCorto name='$nombreCheck'  $checked >";

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
