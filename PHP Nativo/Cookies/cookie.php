<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["numero"])) {
        $cookie_name = "user";
        $cookie_value = "Aaron Medina";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
    header('Location: index.php');
}
