<?php
require "../../dbinfo/loginInfo.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=Clase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Coneccion exitosa";
  } catch(PDOException $e) {
    echo "Conneccion fallida: " . $e->getMessage();
  }