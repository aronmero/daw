<?php
require "../../../dbinfo/loginInfo.php";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM agenda ");

    $stmt->execute();
    $contactosAgenda = $stmt->fetchAll();

    $texto="";
    for ($alumno=0; $alumno < count($contactosAgenda); $alumno++) { 
      $texto = $texto."<div><p>".$contactosAgenda[$alumno]["nombre"]."</p> <p>".$contactosAgenda[$alumno]["telefono"]."</p></div>";
    }
    $contactos=$texto;

    $conn = null;
} catch (PDOException $e) {
    $_SESSION["error"] = "<br>" . $e->getMessage();
}
