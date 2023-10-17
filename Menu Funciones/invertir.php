<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
    $anio = $numeroInvertir = $interes = 0;
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
            <label for="numeroInvertir">Cantidad invertir</label>
            <input type="number" id="numeroInvertir" name="numeroInvertir">
        </div>
        <div><label for="interes">Interés anual</label>
            <input type="number" id="interes" name="interes">
        </div>
        <div><label for="anio">Numero de años</label>
            <input type="number" id="anio" name="anio">
        </div>
        <span id="resultadoInvertir">
            <input type="submit" value="Calcular">
            <p>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (!empty($_POST["numeroInvertir"])) {
                        $numeroInvertir = ($_POST["numeroInvertir"]);
                    }
                    if (!empty($_POST["interes"])) {
                        $interes = ($_POST["interes"]);
                    }
                    if (!empty($_POST["anio"])) {
                        $anio = ($_POST["anio"]);
                    }

                    if (is_numeric($anio) && is_numeric($interes) && is_numeric($numeroInvertir)) {
                        $resultado = $numeroInvertir * ($interes / 100) * $anio;
                        echo "$resultado €";
                    }
                }
                ?></p>
        </span>
    </form>

    <a href="menu.php">Volver</a>
</body>

</html>