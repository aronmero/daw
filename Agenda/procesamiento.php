<?php
session_start();
if(isset($_SESSION["agenda"])){
    $agenda = $_SESSION["agenda"];
}else{
    $agenda = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["error"] = "";
    if (!empty($_POST["nombre"])) {
        $nombre = $_POST["nombre"];

        if (!empty($_POST["telefono"])) {
            //Agregar contacto / sustituir telefono
            $telefono = $_POST["telefono"];
            $agenda[$nombre] = $telefono;
        }else{
            //Eliminar contacto
            unset($agenda[$nombre]);

        }
        

    } else {
        //mensaje de error
        $_SESSION["error"] = "El nombre es Obligaroio!!!!";
    }
    $_SESSION["agenda"]=$agenda;
    header('Location: agenda.php');
}