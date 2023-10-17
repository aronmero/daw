<?php
echo "Ingresa un numero: ";
fscanf(STDIN,"%d",$numero);
$numero;

for($i = 0,$numeroSegundo=1,$numeroPrimero=0,$sumaValores=0; $i <= $numero; $i++){
    echo "$sumaValores ";

    $sumaValores=$numeroPrimero+$numeroSegundo;

    $numeroSegundo=$numeroPrimero;
    

    $numeroPrimero=$sumaValores;
}