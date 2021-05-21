<?php
session_start();


if (isset($_POST["anmelden"])){                                                     /*isset*/

  $bename = $_POST["benname"];
  $paswt = $_POST["pswt"];

  require_once 'datenbankVerbindung.php';
  require_once 'funktionen.php';


  login($connection, $bename, $paswt);

  
}
else {
  header("location: ../login.php");
  exit();
}
