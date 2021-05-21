<?php

function leerInput($nnmae, $vnmae, $email, $bename, $paswt, $paswtwied){
  $leer;
  if(empty($nnmae) || empty($vnmae) || empty($email) || empty($bename) || empty($paswt) || empty($paswtwied)){
    $leer = true;
  }
  else {
    $leer = false;
  }
  return $leer;
}

/*function falscheName($nnmae){
  $nvnam;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $nnmae)){
    $vnnam = true;
  }
  else {
    $nvnam = false;
  }
  return $nvnam;
}*/
function passabweicht($paswt, $paswtwied){
  $abweichung;
  if($paswt !== $paswtwied){
    $abweichung = true;
  }
  else {
    $abweichung = false;
  }
  return $abweichung;
}

function bnamebesetzt($connection, $bename, $email){
  $sql = "Select * FROM benutzertabelle WHERE bspitzname = ? OR bemail = ?; ";  //? platzhalter
  $stmt = mysqli_stmt_init($connection);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../login.php?faild");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $bename, $email);
  mysqli_stmt_execute($stmt);

  $data = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($data)){
    return $row;
  }
  else{
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($connection, $nnmae, $vnmae, $email, $bename, $paswt){
  $sql = "INSERT INTO benutzertabelle (bNachname, bVorname, bemail, bspitzname, bpwt) VALUES (?,?,?,?,?); ";  //? platzhalter
  $stmt = mysqli_stmt_init($connection);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../login.php?failed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "sssss", $nnmae, $vnmae, $email, $bename, PASSWORD_HASH($paswt, PASSWORD_DEFAULT));

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $selctnutz = "SELECT * FROM benutzertabelle WHERE bspitzname ='$bename'";  //benutzer selektieren und mit der profilbild tabelle verknüpfen
  $exce = mysqli_query($connection, $selctnutz);
  while($linie = mysqli_fetch_assoc($exce)){
    $uid = $linie["bId"];
    $insinim = "INSERT INTO profilblid (benutzerId, status) VALUES ('$uid', 1); ";
    mysqli_query($connection, $insinim);
  }

  header("location: ../login.php?error=none");
  exit();
}



function login($connection, $bename, $paswt){
  $usexist = bnamebesetzt($connection, $bename, $bename);

  if($usexist === false){
    header("location: ../login.php?error=loginunmöglich");
    exit();
  }

  $phash = $usexist["bpwt"];
  $checkPwd = password_verify($paswt, $phash);

  if($checkPwd === false){

    header("location: ../login.php?error=falshepass");
    exit();
  }
  else if ($checkPwd === true){
    $_SESSION["userd"] = $usexist["bId"];
    $_SESSION["un"] = $usexist["bspitzname"];
    $_SESSION ['id'] = 1;
    header("location: ../profil.php?error=none");
    exit();
  }
}
