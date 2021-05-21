<?php
session_start();
include_once 'dbconn/datenbankVerbindung.php';
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];


if(isset($_POST['submit'] )){
  $datei = $_FILES['datei'];  /* Infos übers Datei*/
  /*print_r($datei);*/
  $dateiName = $_FILES['datei']['name'];
  $dateiTmp = $_FILES['datei']['tmp_name'];   /*Adresse*/
  $dateiGroesse = $_FILES['datei']['size'];
  $dateiError = $_FILES['datei']['error'];
  $dateiType = $_FILES['datei']['type'];

  $dateiext = explode('.', $dateiName);
  $dateiselected = strtolower(end($dateiext));

  $erlaubtedatei = array('jpg', 'jpeg', 'png', 'pdf');

  if(in_array($dateiselected, $erlaubtedatei)) {
    if($dateiError === 0){
      if($dateiGroesse < 500000) {
         $hochgeladen = 'profile'.$aktuser.".".$dateiselected;
         $dateiplatz = 'Uploads/'.$hochgeladen;
         move_uploaded_file($dateiTmp, $dateiplatz);
         $sql = "UPDATE profilblid SET status = 0 WHERE benutzerId = '$uid';";
         $res = mysqli_query($connection, $sql);

      }else {
        echo " Datei zu Groß !! ";
      }
    }else {
      echo " Etwas ist schief gelaufen! :( )";
    }
  } else {
    echo " Nur jpg/jpeg/png/pdf Datein sind erlaubt!";
  }
}

/*else if(isset($_POST['posten']))
{
	$textareaValue = ($_POST['rezepttextarea']);

	$sql = "INSERT INTO posts (benutzerId, paragraf) values ($uid, '$textareaValue')";
	$rs = mysqli_query($connection, $sql);
  echo "jaaaaa";

}*/
header("location: profil.php");
