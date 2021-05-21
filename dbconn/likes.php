<?php
session_start();
include_once 'datenbankVerbindung.php';


if(isset($_GET["id"])){
  $iid =  $_GET["id"];
  $sqsel = "UPDATE postlike SET likecount = likecount+1 WHERE postID=$iid";
  $rsel = mysqli_query($connection, $sqsel);
}
echo "<script>
             window.history.go(-1);
     </script>";
