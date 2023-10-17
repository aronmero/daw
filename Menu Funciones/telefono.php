<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
 $numTelefono  = 0;
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
            <label for="numTelefono">Numero de telefono</label>
            <input type="text" id="numTelefono" name="numTelefono" value="+34-913724710-56">
        </div>
        <span id="resultadoInvertir">
            <input type="submit" value="Calcular">
            <p >
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    if (!empty($_POST["numTelefono"])) {
                        $numTelefono = ($_POST["numTelefono"]);
                    
                        $numTelefono=preg_replace('(\+\d{1,3}-)',"",$numTelefono);
                        $numTelefono=preg_replace('(-\d{1,3})',"",$numTelefono);
                    }
                    if (is_numeric($numTelefono)&& strlen($numTelefono)==9) {
                        $resultado = $numTelefono;
                        echo "$resultado";
                    }
                }
                ?></p>
        </span>
    </form>

    <a href="menu.php">Volver</a>
</body>

</html>