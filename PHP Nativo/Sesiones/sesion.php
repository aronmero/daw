<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["numero"])) {
        $_SESSION["formulario"]="Se ha enviado correctamente";
        $_SESSION["nombreUsuario"] = "";
        $_SESSION["apellidoUsuario"] = "";
        $_SESSION["numeroUsuario"] = "";

        header('Location: index.php');
    } else {
        if (!empty($_POST["nombre"])) {
            $_SESSION["nombreUsuario"] = $_POST["nombre"];
        }
        if (!empty($_POST["apellido"])) {
            $_SESSION["apellidoUsuario"] = $_POST["apellido"];
        }
        if (!empty($_POST["numero"])) {
            $_SESSION["numeroUsuario"] = $_POST["numero"];
        }
        $_SESSION["formulario"]="No se ha podido enviar";
        header('Location: index.php');
    }
}
