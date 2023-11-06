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
      $stmt = $conn->prepare("SELECT * FROM alumno inner join usuario where alumno.dni=usuario.dni and cial=:cial");
      $stmt->bindParam(':cial', $_SESSION["identificador"]);
      $stmt->execute();
      $datosAlumno = $stmt->fetchAll();
      $longitud = count($datosAlumno);
      //TODO: Visualziacion
      echo $datosAlumno[0][0];

      for ($i = 0; $i < $longitud; $i++) {

        for ($j = 1; $j <= 6; $j++) {
            echo "<div>" . "<div>$j</div><div>" . $datosAlumno[$i][3] . " </div><div>" . $datosAlumno[$i][4] . "</div><div>" . $datosAlumno[$i][5] . " </div></div>";
        }
    }
    } catch (PDOException $e) {
      echo "Conneccion fallida: " . $e->getMessage();
    }
  } else if ($_SESSION["tipoUsuario"] == "profesor") {
    
  }
  ?>
  <a href="index.php">Volver</a>

</body>

</html>