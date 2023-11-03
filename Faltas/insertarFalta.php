<?php
require "../../../dbinfo/loginInfo.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=faltas", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM alumno inner join usuario where alumno.dni=usuario.dni");
    $stmt->execute();
    $datoMostrar = $stmt->fetchAll();
    $longitud = count($datoMostrar);
    $conn = "";
} catch (PDOException $e) {
    echo "Conneccion fallida: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DAW: Faltas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>

    <h1>Lista de alumnos</h1>
    <form method="POST">
        <div>
            <div>Check</div>
            <div>Sesion</div>
            <div>Nombre</div>
            <div>1º Apellido</div>
            <div>2º Apellido</div>
        </div>
        <?php
        for ($i = 0; $i < $longitud; $i++) {

            for ($j = 1; $j <= 6; $j++) {
                echo "<div><div>" . "<input type='checkbox'>" . "</div><div>" . $j . "</div><div>" . $datoMostrar[$i][3] . "</div><div>" . $datoMostrar[$i][4] . "</div><div>" . $datoMostrar[$i][5] . "</div></div>";
            }
        }
        ?>


        <div> <input type="submit"></div>
    </form>
    <a href="index.html">Volver</a>
</body>

</html>