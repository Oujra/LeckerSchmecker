<?php
date_default_timezone_set('Europe/Berlin');

session_start();
include_once 'datenbankVerbindung.php';
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];

if (isset($_POST['kommentieren'])) {
  $beid = $uid;
  $id = $_GET["id"];
  $komm = $_POST['kommtext'];
  $zeit = date("Y-m-d H:i:s");

  mysqli_query($connection, "INSERT INTO  Kommentare (postid, benId, kommentartext, date) VALUES ('$id','$beid','$komm','$zeit')");
  mysqli_query($connection, "UPDATE post SET kommcount = kommcount+1 WHERE id=$id");


  /*echo '<p>';
  echo $id;
  echo $komm;
  echo "The time is " . date("Y-m-d H:i:s");
  echo $beid;
  echo "         ";
  echo $zeit;
  //echo date("Y/m/d");
  echo'</p>';*/

}
echo "<script>
             alert('Ihre Kommentar würde zugesendet');
             window.history.go(-1);
     </script>";
