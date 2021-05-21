<?php
session_start();
include_once 'datenbankVerbindung.php';


if(isset($_GET["id"])){
  $iid =  $_GET["id"];
  //$record = mysqli_query($connection,"SELECT * From post WHERE texte='$beitrag'");
  //$n = mysqli_fetch_array($record);
  //$id = $n['id'];
  //$benid = $n['benutzId'];
  $sqsel = "UPDATE postlike SET dislikecount = dislikecount+1 WHERE postID=$iid";
  $rsel = mysqli_query($connection, $sqsel);

  $sellike = mysqli_query($connection,"SELECT * From postlike");
  $li = mysqli_fetch_array($sellike);
  $dis = $li['dislikecount'];
  $tid = $li['postID'];
  if($dis>2){
  $ex  = mysqli_query($connection,"DELETE * From post WHERE id='$iid'");
  //$exe = mysqli_query($connection,"DELETE * From postlike WHERE dislikecount>2");
  }

}

echo "<script>
             window.history.go(-1);
     </script>";
