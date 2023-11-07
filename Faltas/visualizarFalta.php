<?php
//require "../../../dbinfo/loginInfo.php";
require "../loginInfo.php";
session_start();

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
    try {
      $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM  alumno where cial=:cial");
      $stmt->bindParam(':cial', $_SESSION["identificador"]);
      $stmt->execute();
      $infoAlumno = $stmt->fetch();

      echo "<div id=infoFalta><div>Cial:" . $infoAlumno[0] . "</div><div>DNI: " . $infoAlumno[1] . "</div><div>Grupo: " . $infoAlumno[2] . "</div></div>";

      $stmt = $conn->prepare("SELECT * FROM falta inner join alumno on falta.cial=alumno.cial where falta.cial=:cial");
      $stmt->bindParam(':cial', $_SESSION["identificador"]);
      $stmt->execute();
      $datosAlumno = $stmt->fetchAll();
      $longitud = count($datosAlumno);

      //TODO: Visualziacion
      //echo $datosAlumno[0][0];

      echo "<div><div class='mostrarFaltas encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div><div>" . "Motivo" . " </div></div>";
      for ($i = 0; $i < $longitud; $i++) {
        echo "<div class=mostrarFaltas>" . "<div>" . $datosAlumno[$i][4] . "</div><div>" . $datosAlumno[$i][3] . " </div><div>" . '$tipoFalta' . "</div><div>" ."Motivo". " </div></div>";
      }
      echo "</div>";
      $conn = "";
    } catch (PDOException $e) {
      echo "Conneccion fallida: " . $e->getMessage();
    }
  } else if ($_SESSION["tipoUsuario"] == "profesor") {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM  usuario inner join profesor on usuario.dni=profesor.dni where idCorreo=:idCorreo");
      $stmt->bindParam(':idCorreo', $_SESSION["identificador"]);
      $stmt->execute();
      $infoProfesor = $stmt->fetch();

      echo "<div id=infoFalta><div>Profesor: $infoProfesor[0] $infoProfesor[1] $infoProfesor[2] </div><div>DNI: " . $infoProfesor[3] . "</div><div>Correo: " . $infoProfesor[5] . "</div></div>";

      echo "<div><div class='mostrarFaltas mostrarFaltasProfesor encabezado'>" . "<div>Fecha</div><div>" . "Sesion" . " </div><div>" . "Tipo falta" . "</div><div>" . "Motivo" . " </div><div>" . "Alumno" . " </div><div>" . "DNI" . " </div></div>";

      $stmt = $conn->prepare("SELECT * FROM falta inner join alumno on falta.cial=alumno.cial inner join usuario on alumno.dni=usuario.dni");
      $stmt->execute();
      $datosAlumno = $stmt->fetchAll();
      $longitud = count($datosAlumno);

      for ($i = 0; $i < $longitud; $i++) {
        echo "<div class='mostrarFaltas mostrarFaltasProfesor'>" . "<div>" . $datosAlumno[$i][4] . "</div><div>" . $datosAlumno[$i][3] . " </div><div>" . '$tipoFalta' . "</div><div>" .'$motivo'. " </div><div>" . $datosAlumno[$i][9] ." ". $datosAlumno[$i][10] ." ". $datosAlumno[$i][11] . " </div><div>" . $datosAlumno[$i][7] . " </div></div>";
      }


      echo "</div>";
      $conn = "";
    } catch (PDOException $e) {
      echo "Conneccion fallida: " . $e->getMessage();
    }
  }

  ?>
  <a href="index.php">Volver</a>

</body>

</html>