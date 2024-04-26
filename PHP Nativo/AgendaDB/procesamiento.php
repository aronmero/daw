<?php
require "../../../dbinfo/loginInfo.php";
session_start();

//Inicializacion de agenda
if (isset($_SESSION["agenda"])) {
    $agenda = $_SESSION["agenda"];
} else {
    $agenda = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["error"] = ""; //mensaje de error
    if (!empty($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        try {
            //Coneccion
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          
            if (!empty($_POST["telefono"])) {
                $telefono=$_POST["telefono"];

                $stmt = $conn->prepare("SELECT nombre FROM agenda where nombre=:nombre");
                $stmt->bindParam(':nombre', $nombre);
                $stmt->execute();
                $comprobarNombre = $stmt->fetch();

                if (isset($comprobarNombre["nombre"])&&$comprobarNombre["nombre"]== $nombre) {
                    //sustituir telefono
                    $stmt = $conn->prepare("UPDATE agenda SET telefono = :telefono WHERE nombre = :nombre");
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':telefono', $telefono);
                    $stmt->execute();
                    
                } else {
                    //Agregar contacto
                    $stmt = $conn->prepare("INSERT INTO agenda (nombre, telefono) VALUES (:nombre, :telefono)");
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':telefono', $telefono);
                    $stmt->execute();
                }
               
            } else {
                //Eliminar contacto
                $stmt = $conn->prepare("DELETE FROM agenda WHERE nombre = :nombre");
                $stmt->bindParam(':nombre', $nombre);
                $stmt->execute();
            }
            $_SESSION["ocultar"] = ""; //Elimina la ocultacion de elementos
        } catch (PDOException $e) {
            $_SESSION["error"] = "<br>" . $e->getMessage();
        }
    } else {
        //mensaje de error
        $_SESSION["error"] = "El nombre es Obligatorio!!!!";
    }
 
     header('Location: agenda.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION["error"] = "";
    try {
        //Coneccion
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM agenda");
        $stmt->execute();
    } catch (PDOException $e) {
        $_SESSION["error"] = "<br>" . $e->getMessage();
    }

    $_SESSION["ocultar"] = "hidden"; //Activa la ocultacion de elementos
    header('Location: agenda.php');
}
