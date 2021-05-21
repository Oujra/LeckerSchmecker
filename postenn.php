<?php
session_start();
include_once 'dbconn/datenbankVerbindung.php';
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];

if(isset($_POST['posten']))
{
	$textareaValue = ($_POST['rezepttextarea']);

	$sql = "INSERT INTO posts (benutzerId, paragraf) values ($uid, '$textareaValue')";
	$rs = mysqli_query($connection, $sql);
  echo "jaaaaa";

}
header("location: profil.php");
