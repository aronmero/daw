<?php
session_start();

$_SESSION["identificador"]=null;
$_SESSION["tipoUsuario"]=null;


header("Location: index.php");
