<?php
session_start();

//Recibir mensaje de error
if (empty($_SESSION["error"])) {
  $_SESSION["error"] = "";
}
//Recibir agenda
if (isset($_SESSION["agenda"])) {
  $agenda = $_SESSION["agenda"];
} else {
  $agenda = [];
}

//Ocultacion de elementos
if (isset($_SESSION["ocultar"])) {
  $ocultar = $_SESSION["ocultar"];
}  else {
  $ocultar = "hidden";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Agenda</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="agenda.css" />
</head>

<body>
  <p id="errores"><?php echo $_SESSION["error"] ?></p>
  <div id="divAgenda">
    <h1>Agenda</h1>
    <fieldset id="datosAgenda" <?php print $ocultar ?>>

      <legend>Datos Agenda</legend>
      <?php
      if (isset($agenda)) {

        foreach ($agenda as $nombre => $telefono) {

          echo "<div><p>$nombre</p> <p>$telefono</p></div>";
        }
      }
      ?>
    </fieldset>
    <fieldset>
      <legend>Nuevo Contacto</legend>
      <form method="post" action="procesamiento.php">
        <div><label>Nombre:</label><input name="nombre" type="text" /></div>
        <div><label>Telefono:</label><input name="telefono" type="tel" /></div>
        <input type="submit" value="Añadir Contacto" id="enviarDatos" />
        <input type="reset" value="Limpiar Campos" id="limpiarDatos" />
      </form>
    </fieldset>

    <fieldset <?php print $ocultar ?>>
      <legend>Vaciar Agenda</legend>
      <form method="GET" action="procesamiento.php">
      
        <input type="submit" value="Vaciar" id="vaciarDatos">
      </form>
    </fieldset>

  </div>
</body>

</html>