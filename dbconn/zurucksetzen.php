<?php
include_once 'datenbankVerbindung.php';

if(isset($_POST['linksenden'])){
  $email = $_POST['emailoderbname'];
  echo $email;

  $emailexist = mysqli_query($connection, "SELECT * FROM benutzertabelle WHERE bemail='$email'");


  if (mysqli_num_rows ($emailexist)==1){
    $subj = "Hi";
    $geheim = rand(1000,9999);
    $codezurucks = "http://localhost/LeckerSchmecker/neupass.php?email=$email&code=$geheim";
    mail($email, $subj , $codezurucks);
    echo "gesendet";

  }
  else {
    echo "email existiert nicht";
  }

}
