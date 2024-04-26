<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Calculadora</title>
    <style>
        h1 {
            margin: 20px;
        }

        form {
            border: 1px solid black;
            padding: 15px;
            border-radius: 15px;
            width: 350px;
        }

        .error {
            color: red;
        }

        input[type=submit] {
            border-radius: 5px;
            padding: 10px 15px;
            border: 1px solid black;
        }

        input[type=number] {
            border-radius: 5px;
            border: 1px solid black;
            padding: 5px;
            width: 100px;
            text-align: center;
        }

        select {
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // define variables and set to empty values
    $opcionErr = $numeroPrimeroErr = $numeroSegundoErr = "";
    $opcion = $numeroPrimero = $numeroSegundo  = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["opcion"])) {
            $opcionErr = "Requerido";
        }
        if (empty($_POST["numeroPrimero"])) {
            $numeroPrimeroErr = "Requerido";
        } else {
            $numeroPrimero = ($_POST["numeroPrimero"]);
        }
        if (empty($_POST["numeroSegundo"])) {
            $numeroSegundoErr = "Requerido";
        } else {
            $numeroSegundo = ($_POST["numeroSegundo"]);
        }
        if (!empty($_POST["opcion"]) && !empty($_POST["numeroPrimero"]) && !empty($_POST["numeroSegundo"])) {
            $opcion = ($_POST["opcion"]);
        }
    }
    ?>
    <h1>Calculadora PHP</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <select name="opcion">
            <option value=1>Suma</option>
            <option value=2>Resta</option>
            <option value=3>Multiplicacion</option>
            <option value=4>Division</option>

        </select>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($opcion) && is_numeric($numeroPrimero) && is_numeric($numeroSegundo)) {

                switch ($opcion) {
                    case 1:
                        $resultado = $numeroPrimero + $numeroSegundo;
                        echo "El resultado de tu operacion es $resultado \n";

                        break;
                    case 2:
                        $resultado = $numeroPrimero - $numeroSegundo;
                        echo "El resultado de tu operacion es $resultado \n";

                        break;
                    case 3:
                        $resultado = $numeroPrimero * $numeroSegundo;
                        echo "El resultado de tu operacion es $resultado \n";

                        break;
                    case 4:
                        $resultado = $numeroPrimero / $numeroSegundo;

                        echo "El resultado de tu operacion es $resultado \n";

                        break;
                    default:
                        echo "No se pudo realizar la operacion \n";
                }
                $resultado = 0;
                $numeroPrimero = $numeroSegundo = null;
            }
        }
        ?>
        <br><br>
        <label for="numeroPrimero">Primer numero</label>
        <input type="number" id="numeroPrimero" name="numeroPrimero" value="<?php echo $numeroPrimero; ?>"></label><span class="error"> * <?php echo $numeroPrimeroErr; ?></span>
        <br><br>
        <label for="numeroSegundo">Segundo numero</label>
        <input type="number" id="numeroSegundo" name="numeroSegundo" value="<?php echo $numeroSegundo; ?>"></label><span class="error"> * <?php echo $numeroSegundoErr; ?></span>
        <br><br>
        <input type="submit" value="Calcular">

    </form>


</body>

</html>