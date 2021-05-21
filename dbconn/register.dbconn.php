<?php
  if (isset($_POST["bestätigen"])){                                                     /*isset*/

    $nnmae = $_POST["nachname"];
    $vnmae = $_POST["vorname"];
    $email = $_POST["email"];
    $bename = $_POST["benname"];
    $paswt = $_POST["pswt"];
    $paswtwied = $_POST["pswtwieder"];



    require_once 'datenbankVerbindung.php';
    require_once 'funktionen.php';

    if (leerInput($nnmae, $vnmae, $email, $bename, $paswt, $paswtwied) !== false){
      header("location: ../login.php?error=Siehabennichtseingegeben");
      exit();
    }

    if (passabweicht($paswt, $paswtwied) !== false){

      header("location: ../login.php?error=esgibtabweichungenbeimpass");
      exit();
    }
    if (bnamebesetzt($connection, $bename, $email) !== false) {/*musste im db gesucht erstmal*/
      header("location: ../login.php?error=benutzarnamenichtverfügbar");
      exit();
    }

    createUser($connection, $nnmae, $vnmae, $email, $bename, $paswt);

  }

  else {
    header("location: ../login.php");
    exit();
  }
