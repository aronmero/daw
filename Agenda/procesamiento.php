<?php
session_start();

//Inicializacion de agenda
if (isset($_SESSION["agenda"])) {
    $agenda = $_SESSION["agenda"];
} else {
    $agenda = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["error"] = "";//mensaje de error
    if (!empty($_POST["nombre"])) {
        $nombre = $_POST["nombre"];

        if (!empty($_POST["telefono"])) {
            //Agregar contacto / sustituir telefono
            $telefono = $_POST["telefono"];
            $agenda[$nombre] = $telefono;
        } else {
            //Eliminar contacto
            unset($agenda[$nombre]);
        }
        $_SESSION["ocultar"]= "";//Elimina la ocultacion de elementos
    } else {
        //mensaje de error
        $_SESSION["error"] = "El nombre es Obligaroio!!!!";
    }
    $_SESSION["agenda"] = $agenda;
    header('Location: agenda.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION["error"] = "";
    $agenda = [];
    $_SESSION["agenda"] = $agenda;
    $_SESSION["ocultar"]= "hidden";//Activa la ocultacion de elementos
    header('Location: agenda.php');
}
