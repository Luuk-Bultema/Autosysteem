<?php

$host = "localhost";
$dbnaam = "autos";
$gebruiker = "root";
$ww = "";

$conn = new PDO("mysql:host=$host;dbname=$dbnaam;",
    $gebruiker, $ww);

?>
