<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Procesar formulario</title>
</head>

<body>

    <h1>Gracias por enviar formulario</h1>
    <?php

    $nombreError = $emailError = "";
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (empty($_GET["nombre"])) {
            $nombreError = "Nombre es requerido!";
        } else {
            $nombre = test_input($_GET["nombre"]);
        }
        if (empty($_GET["email"])) {
            $nombreError = "Email es requerido!";
        } else {
            $email = test_input($_GET["email"]);
        }
        echo "<p>Nombre: " . $nombre . "</p>";
        echo "<p>Email: " . $email . "</p>";
    } else {
        echo "<p>Error, petición no esperada!</p>";
    }
    ?>
    <p><a href="formulario.php">Volver</a></p>
</body>

</html>