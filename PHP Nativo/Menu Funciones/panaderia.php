<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
    $anio = $barrasSinVender = $interes = 0;
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
            <label for="barrasSinVender">Barras vendidas que no son del dia</label>
            <input type="number" id="barrasSinVender" name="barrasSinVender">
        </div>
        <span id="resultadoInvertir">
            <input type="submit" value="Calcular">
            <p id="pPanaderia">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (!empty($_POST["barrasSinVender"])) {
                        $barrasSinVender = ($_POST["barrasSinVender"]);
                    }

                    if (is_numeric($barrasSinVender)) {
                        $resultado = 3.49;
                        echo "Barra de pan $resultado € <br>";
                        $resultado = round($resultado * 0.6,2);
                        echo "Barra de pan con descuento $resultado €";
                    }
                }
                ?></p>
        </span>
    </form>

    <a href="menu.php">Volver</a>
</body>

</html>