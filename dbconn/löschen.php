<?php
session_start();
include_once 'datenbankVerbindung.php';
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];


if(isset($_GET["id"])){
  $i = $_GET["id"];
  $sqlöschen = "DELETE FROM post WHERE id = '$i';";
  $resu = mysqli_query($connection, $sqlöschen);
  header("location: ../profil.php");
}

?>
