<?php
require "../loginInfo.php";
function ImprimirCurso($conn, $grupoSeleccionado)
{
  $stmt = $conn->prepare("SELECT * FROM  curso ");
  $stmt->execute();
  $infoCursos = $stmt->fetchAll();
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
    $botonMostrar = ($idAccion == $accionFaltaSeleccionada) ? "<div id=$idAccion class=seleccionado>$textoAccion</div>" : "<div id=$idAccion>$textoAccion</div>";
    echo $botonMostrar;
  }
  echo "</div>";
}

function imprimirAlumnado($grupoSeleccionado, $fecha): void
{
  require "../loginInfo.php";

  echo '<div class="encabezado"><div>Check</div><div>Sesion</div><div>Nombre y apellidos</div><div>Tipo de falta</div></div>';
  try {
    $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM alumno  inner join usuario on alumno.dni=usuario.dni where idCurso=:idCurso");
    $stmt->bindParam(':idCurso', $grupoSeleccionado);
    $stmt->execute();
    $datosAlumno = $stmt->fetchAll();
    $longitud = count($datosAlumno);
    $_SESSION["numAlumnosInserccion"] = $longitud;
    $conn = "";
  } catch (PDOException $e) {
    echo "Conneccion fallida: " . $e->getMessage();
  }
  for ($alumno = 0; $alumno < $longitud; $alumno++) {
    try {
      if (!isset($fecha)) {
        $fecha = date("Y-m-d");
      }
      $cialAlumnoMostrar = $datosAlumno[$alumno]['cial'];
      $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM falta  where cial=:cial and dia=:dia");
      $stmt->bindParam(':cial', $cialAlumnoMostrar);
      $stmt->bindParam(':dia', $fecha);
      $stmt->execute();
      $faltas = $stmt->fetchAll();
      $numFaltas = count($faltas);

      echo "<div class=datosAlumno>";
      echo "<div class=navAlumno><input type=checkbox> " . $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] . "</div>";

      //Array con tipos de falta, como no hay tipos definidos en la base de datos
      $tiposFalta = ["Falta sin Justificar", "Falta Justificada"];
      for ($sesion = 1; $sesion <= 6; $sesion++) {
        $checked = "";
        $existeFalta = "";
        $idfalta = "";
        $readonly = "";
        $tipoFalta = $tiposFalta[0];
        for ($falta = 0; $falta < $numFaltas; $falta++) {
          if ($faltas[$falta]['sesion'] == $sesion) {
            $existeFalta = "faltaExistente";
            $checked = "checked";
            $readonly = "read-only";
            $idfalta = $faltas[$falta]['idfalta'];
            $tipoFalta = $faltas[$falta]['tipoFalta'];
            break;
          }
        }
        $nombreCheck = $alumno . "checkbox$sesion";
        echo "<div class=$existeFalta>" . "<input type='checkbox' $readonly " . "" . "class=secretoCorto name='$nombreCheck'  $checked >";

        echo "<input type=hidden name=" . $sesion . "faltaExistente$alumno value=" . $idfalta . ">";

        echo "<input type=hidden name=cialAlumno$alumno value=" . $datosAlumno[$alumno]['cial'] . ">" .
          "<div class=secretoCorto>$sesion</div><p>" . $datosAlumno[$alumno]['nombre'] . " " . $datosAlumno[$alumno]['primer_apellido'] . " " . $datosAlumno[$alumno]['segundo_apellido'] .
          " </p><div><select name=" . $alumno . "tipoFalta" . $sesion . ">";
        for ($falta = 0; $falta < count($tiposFalta); $falta++) {
          echo ($tipoFalta == $tiposFalta[$falta]) ? "<option value='$tiposFalta[$falta]' selected>$tiposFalta[$falta]</option>" : " <option value='$tiposFalta[$falta]'>$tiposFalta[$falta]</option>";
        }

        echo "</select></div></div>";
      }
    } catch (PDOException $e) {
      echo "Conneccion fallida: " . $e->getMessage();
    }
    echo "</div>";
  }
}
