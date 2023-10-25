<?php
require "../../../dbinfo/loginInfo.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>
</head>

<body>
    <div>
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label for="nombreUsuario">Nombre*</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario">
            <label for="apellidosUsuario">Apellidos*</label>
            <input type="text" name="apellidosUsuario" id="apellidosUsuario">
            <label for="emailUsuario">email*</label>
            <input type="email" name="emailUsuario" id="emailUsuario">
            <label for="fechaNac">Fecha nacimiento*</label>
            <input type="date" name="fechaNac" id="fechaNac">
            <label for="contrasena">Contraseña*</label>
            <input type="password" name="contrasena" id="contrasena">
            <label for="cContrasena">Comprobar Contraseña*</label>
            <input type="password" name="cContrasena" id="cContrasena">
            <label for="foto">Fotografia</label>
            <input type="file" name="foto" id="foto">
            <input type="submit" value="Enviar">
        </form>

    </div>
    <a href="index.html">Volver</a><br>

    <?php


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

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("INSERT INTO usuarios (nombreUsuario, apellidosUsuario, emailUsuario, fechaNac, contrasena, foto)
                    VALUES (:nombreUsuario, :apellidosUsuario, :emailUsuario,:fechaNac,:contrasena, :imagen)");

                    $stmt->bindParam(':nombreUsuario', $nombreUsuario);
                    $stmt->bindParam(':apellidosUsuario', $apellidosUsuario);
                    $stmt->bindParam(':emailUsuario', $emailUsuario);
                    $stmt->bindParam(':fechaNac', $fechaNac);
                    $stmt->bindParam(':contrasena', $contrasenaHash);
                    $stmt->bindParam(':imagen', $imagen);
                    $stmt->execute();
                    //$conn->exec($sql);
                    echo "Registro completado";
                } catch (PDOException $e) {
                    echo "<br>" . $e->getMessage();
                }

                $conn = null;
            } else {
                echo "Error contraseña incorrecta";
            }
        } else {
            echo "Error";
        }
    }




    ?>
</body>

</html>