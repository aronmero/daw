<?php
do {
    echo "Que operacion quieres hacer: \n";
    echo "1.Suma \n";
    echo "2.Resta \n";
    echo "3.Multiplicacion \n";
    echo "4.Division \n";
    echo "0.Salir \n";
    $opcion = 0;
    fscanf(STDIN, "%d", $opcion);
    if ($opcion != 0) {

        switch ($opcion) {
            case 1:
                echo "Primer numero: \n";
                fscanf(STDIN, "%d", $numeroPrimero);
                echo "Segundo numero: \n";
                fscanf(STDIN, "%d", $numeroSegundo);

                $resultado = $numeroPrimero + $numeroSegundo;
                echo "El resultado de tu operacion es $resultado \n";
                break;
            case 2:
                echo "Primer numero: \n";
                fscanf(STDIN, "%d", $numeroPrimero);
                echo "Segundo numero: \n";
                fscanf(STDIN, "%d", $numeroSegundo);

                $resultado = $numeroPrimero - $numeroSegundo;
                echo "El resultado de tu operacion es $resultado \n";
                break;
            case 3:
                echo "Primer numero: \n";
                fscanf(STDIN, "%d", $numeroPrimero);
                echo "Segundo numero: \n";
                fscanf(STDIN, "%d", $numeroSegundo);

                $resultado = $numeroPrimero * $numeroSegundo;
                echo "El resultado de tu operacion es $resultado \n";
                break;
            case 4:
                echo "Primer numero: \n";
                fscanf(STDIN, "%d", $numeroPrimero);
                echo "Segundo numero: \n";
                fscanf(STDIN, "%d", $numeroSegundo);

                $resultado = $numeroPrimero / $numeroSegundo;
                echo "El resultado de tu operacion es $resultado \n";
                break;
            default:
                echo "No se pudo realizar la operacion \n";
        }

        $resultado = 0;
    }
} while ($opcion != 0);

echo "Finalizando \n";
