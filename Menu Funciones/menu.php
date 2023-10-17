<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Calculadora</title>
    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
    // define variables and set to empty values
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["opcion"])) {
            $opcion = ($_POST["opcion"]);
        }
    }else{
        $opcion=null;
    }

    if (isset($_POST['submit'])) {

        switch ($opcion) {
            case 1:
                header('Location: invertir.php');
                break;
            case 2:
                header('Location: cuenta.php');
                break;
            case 3:
                header('Location: panaderia.php');
                break;
            case 4:
                header('Location: telefono.php');
                break;
            case 5:
                header('Location: edad.php');
                break;
            case 6:
                header('Location: contrasena.php');
                break;
        }
        exit;
    }


    ?>
    <h1>Menu funciones</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <select name="opcion">
            <option value=1>Invertir</option>
            <option value=2>Cuenta</option>
            <option value=3>Panaderia</option>
            <option value=4>Telefono</option>
            <option value=5>edad</option>
            <option value=6>contraseña</option>
        </select>
        <input type="submit" name="submit" value="Operar">

    </form>


</body>

</html>