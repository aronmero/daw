<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW: Faltas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>

</head>

<body>
    <a href="index.html">Volver</a>
    
</body>

</html>
<?php
require "../../../dbinfo/loginInfo.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  } catch(PDOException $e) {
    echo "Conneccion fallida: " . $e->getMessage();
  }