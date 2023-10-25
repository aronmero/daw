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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label for="emailUsuario">email*</label>
            <input type="email" name="emailUsuario" id="emailUsuario">
            <label for="contrasena">Contraseña*</label>
            <input type="password" name="contrasena" id="contrasena">
            <input type="submit" value="Enviar">
        </form>

    </div>
    <a href="index.html">Volver</a><br>

    <?php




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
                    $resultado = $stmt->fetchAll();

                    echo $resultado[0]["nombreUsuario"] . "<br>";
                    echo $resultado[0]["apellidosUsuario"] . "<br>";
                    echo $resultado[0]["emailUsuario"] . "<br>";
                    echo $resultado[0]["fechaNac"] . "<br>";

                    $imagenPerfil = $resultado[0]["foto"];
                    if ($imagenPerfil != null) {
                        echo  "<img src='$imagenPerfil'>;";
                    } else {
                        echo "No se ha subido imagen";
                    }
                } else {
                    echo "Error contraseña incorrecta";
                }
            } catch (PDOException $e) {
                echo "<br>" . $e->getMessage();
            }




            $conn = null;
        } else {
            echo "Error contraseña incorrecta";
        }
    } else {
    }

    ?>
</body>

</html>