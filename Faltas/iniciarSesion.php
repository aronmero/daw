<?php
//require "../../../dbinfo/loginInfo.php";
require "../loginInfo.php";
session_start();

if (!isset($_SESSION["tipoUsuario"])) {
    $_SESSION["tipoUsuario"] = null;
}

if (!isset($_SESSION["identificador"])) {
    $_SESSION["identificador"] = null;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW:Faltas - Inicio sesion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div><label>Dni: </label><input type="text" name=dni required></div>
        <div><label>Contraseña: </label><input type="password" name=contrasena required></div>
        <div><input type="submit"></div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST["dni"];
        $contrasena = $_POST["contrasena"];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT contrasena FROM  usuario where dni=:dni");
            $stmt->bindParam(':dni', $dni);
            $stmt->execute();
            $contrasenaDB = $stmt->fetch();
            // $datoMostrar[0]; contraseña
            //Todo: Cambiar metodo a HASH
            if ($contrasenaDB[0] == $contrasena) {

                $stmt = $conn->prepare("SELECT * FROM  profesor where dni=:dni");
                $stmt->bindParam(':dni', $dni);
                $stmt->execute();
                $datosProfesor = $stmt->fetch();
                if (isset($datosProfesor[0])) {
                    $_SESSION["tipoUsuario"] = "profesor";
                    $_SESSION["identificador"] = $datosProfesor[0];
                    header('Location: index.php');
                } else {
                    $stmt = $conn->prepare("SELECT * FROM  alumno where dni=:dni");
                    $stmt->bindParam(':dni', $dni);
                    $stmt->execute();
                    $datosAlumno = $stmt->fetch();

                    $_SESSION["tipoUsuario"] = "alumno";
                    $_SESSION["identificador"] = $datosAlumno[0];
                    header('Location: index.php');
                }
            }
            $conn = "";
        } catch (PDOException $e) {
            echo "Conneccion fallida: " . $e->getMessage();
        }
    }

    ?>
</body>

</html>