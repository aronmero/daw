<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agenda = [];
    $_SESSION["agenda"]=$agenda;
    header('Location: agenda.php');
}