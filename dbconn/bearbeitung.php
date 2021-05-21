<?php
session_start();
include_once 'datenbankVerbindung.php';
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];

if (isset($_POST['bearbeitung'])) {
  $id = $_GET["id"];
  $rez = $_POST['rezepttextarea'];
  $reztitel = $_POST['rezeptitel'];
  $rezu   = $_POST['rezzut'];

  mysqli_query($connection, "UPDATE post SET texte='$rez', reztitel='$reztitel', zutaten='$rezu' WHERE id=$id");

  header('location: ../profil.php');
}
