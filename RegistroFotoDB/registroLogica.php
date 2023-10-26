<?php
require "../../../dbinfo/loginInfo.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nombreUsuario"]) && !empty($_POST["apellidosUsuario"]) && !empty($_POST["emailUsuario"]) && !empty($_POST["fechaNac"]) && !empty($_POST["contrasena"]) && !empty($_POST["cContrasena"])) {
        $nombreUsuario = $_POST["nombreUsuario"];
        $apellidosUsuario = $_POST["apellidosUsuario"];
        $emailUsuario = $_POST["emailUsuario"];
        $fechaNac = $_POST["fechaNac"];
        $contrasena = $_POST["contrasena"];
        $cContrasena = $_POST["cContrasena"];
        if ($contrasena == $cContrasena) {
            //Imagen
            $contrasenaHash = password_hash($contrasena, PASSWORD_BCRYPT);

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT emailUsuario FROM usuarios where emailUsuario=:email");
                $stmt->bindParam(':email', $emailUsuario);
                $stmt->execute();

                $comprobarEmail = $stmt->fetch();


                if (strcmp($comprobarEmail["emailUsuario"], $emailUsuario)) {

                    $imagen = guardarImagen($emailUsuario);

                    $stmt = $conn->prepare("INSERT INTO usuarios (nombreUsuario, apellidosUsuario, emailUsuario, fechaNac, contrasena, foto)
                        VALUES (:nombreUsuario, :apellidosUsuario, :emailUsuario,:fechaNac,:contrasena, :imagen)");

                    $stmt->bindParam(':nombreUsuario', $nombreUsuario);
                    $stmt->bindParam(':apellidosUsuario', $apellidosUsuario);
                    $stmt->bindParam(':emailUsuario', $emailUsuario);
                    $stmt->bindParam(':fechaNac', $fechaNac);
                    $stmt->bindParam(':contrasena', $contrasenaHash);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->execute();
                    $_SESSION["registroMensaje"]="Registro completado";
                } else {
                    $_SESSION["registroMensaje"]= "El usuario ya existe";
                }
            } catch (PDOException $e) {
                $_SESSION["registroMensaje"]= "<br>" . $e->getMessage();
            }

            $conn = null;
        } else {
            $_SESSION["registroMensaje"]= "Error contraseña incorrecta";
        }
    } else {
        $_SESSION["registroMensaje"]= "Error";
    }
    header('Location: registro.php');
}

/**
 * Metodo para guardar la imagen en el servidor
 * @return string devuelve la ubicacion y el nombre de la imagen
 */
function guardarImagen($emailUsuario): string|null
{
    if (!file_exists("./fotoPerfil/")) {
        mkdir("./fotoPerfil/");
    }
    if (!file_exists("./fotoPerfil/")) {
        mkdir("./fotoPerfil/");
    }
    if (isset($_FILES["foto"])) {
        $tamanoMaximo = 2 * 1024 * 1024;

        $tiposPermitidos = ['image/jpeg', 'image/png'];

        if ($_FILES['foto']['size'] <= $tamanoMaximo && in_array($_FILES['foto']['type'], $tiposPermitidos)) {

            $targetDir = "./fotoPerfil/";
            $targetImagen = $targetDir . $emailUsuario . $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"], $targetImagen);
            $imagen = $targetImagen;
        } else {
            $imagen =  null;
        }
    } else {
        $imagen =  null;
    }
    return $imagen;
}
