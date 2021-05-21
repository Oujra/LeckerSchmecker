<?php

$server = "localhost";
$dbUname = "root";
$dbPass = "";
$dbName = "leckerschmecker";
//$server = "localhost";
//$dbUname = "mojr34";
//$dbPass = "8U-VW6MDPJqsbDcw";
//$dbName = "mojr34_1";

$connection = mysqli_connect($server, $dbUname, $dbPass, $dbName);

if (!$connection){
    die("Fehler: " . mysqli_connect_error());
}
