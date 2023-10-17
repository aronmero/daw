<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <link rel='stylesheet' type='text/css' media='screen' href='estilo.css'>

</head>

<body>
    <?php
     $contrasena  = "";
     $contrasenaSecreta  = "1234";
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
            <label for="contrasena">Introduce tu contrasena: </label>
            <input type="text" id="contrasena" name="contrasena">
        </div>
        <span id="resultadoInvertir">
            <input type="submit" value="Calcular">
            <p id="pcontrasena">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (!empty($_POST["contrasena"])) {
                        $contrasena = ($_POST["contrasena"]);
                    }

                    if (is_numeric($contrasena)) {
                        if($contrasena==$contrasenaSecreta){
                            echo "Contraseña Correcta";
                        }else{
                             echo "Contreña Incorrecta";
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