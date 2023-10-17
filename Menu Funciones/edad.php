<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
     $edad  = "";
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
            <label for="edad">Introduce tu edad: </label>
            <input type="number" id="edad" name="edad">
        </div>
        <span id="resultadoInvertir">
            <input type="submit" value="Calcular">
            <p id="pEdad">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (!empty($_POST["edad"])) {
                        $edad = ($_POST["edad"]);
                    }

                    if (is_numeric($edad)) {
                        if($edad>=18){
                            echo "Eres mayor de edad";
                        }else{
                             echo "Eres menor de edad";
                        }
                       
                    }else{
                        echo "Error";
                    }
                }
                ?></p>
        </span>
    </form>

    <a href="menu.php">Volver</a>
</body>

</html>