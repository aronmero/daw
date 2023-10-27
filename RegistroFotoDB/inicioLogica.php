<?php
require "../../../dbinfo/loginInfo.php";
session_start();
$_SESSION["inicioMensaje"]="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["emailUsuario"])  && !empty($_POST["contrasena"])) {
        $emailUsuario = $_POST["emailUsuario"];
        $contrasena = $_POST["contrasena"];



        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT contrasena FROM usuarios where emailUsuario=:email");
            $stmt->bindParam(':email', $emailUsuario);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();

            if (password_verify($contrasena, $result[0]["contrasena"])) {
                $stmt = $conn->prepare("SELECT * FROM usuarios where emailUsuario=:email");
                $stmt->bindParam(':email', $emailUsuario);
                $stmt->execute();
                $datoMostrar = $stmt->fetch();

                $_SESSION["inicioMensaje"]= "Nombre de usuario: " . $datoMostrar["nombreUsuario"] . "<br>";

                $_SESSION["inicioMensaje"]=$_SESSION["inicioMensaje"]. "Apellidos de usuario: " . $datoMostrar["apellidosUsuario"] . "<br>";
                $_SESSION["inicioMensaje"]=$_SESSION["inicioMensaje"]. "Email: " . $datoMostrar["emailUsuario"] . "<br>";
                $_SESSION["inicioMensaje"]=$_SESSION["inicioMensaje"]. "Fecha de nacimiento: " . $datoMostrar["fechaNac"] . "<br>";

                $imagenPerfil = $datoMostrar["foto"];
                if ($imagenPerfil != null) {
                    $_SESSION["inicioMensaje"]=$_SESSION["inicioMensaje"].  "<img src='$imagenPerfil'>;";
                } else {
                    $_SESSION["inicioMensaje"]=$_SESSION["inicioMensaje"]. "No se ha subido imagen";
                }
            } else {
                $_SESSION["inicioMensaje"]= "Error contraseña incorrecta";
            }
        } catch (PDOException $e) {
            $_SESSION["inicioMensaje"]= "<br>" . $e->getMessage();
        }


        $conn = null;
    } else {
        $_SESSION["inicioMensaje"]= "Error contraseña incorrecta";
    }
    header('Location: inicio.php');
} 
