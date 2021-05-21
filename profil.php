<?php
    include 'header.php';
    include_once 'dbconn/datenbankVerbindung.php';
//    $aktuser = $_SESSION["un"];
    $uid = $_SESSION["userd"];
//    echo session_id();
//    echo "IdUser  ";
//    echo $uid;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      if (isset($_SESSION["un"])){
        $aktuser = $_SESSION["un"];
        $sqlbenutzer = "SELECT * FROM benutzertabelle WHERE bspitzname = '$aktuser' ";   //benutzer aus der Tabelle selektieren
        $erg = mysqli_query($connection, $sqlbenutzer);
          while ($bn = mysqli_fetch_assoc($erg)){
            $idnutzer = $bn['bId'];
            $selectbild = "SELECT * FROM profilblid WHERE benutzerId='$idnutzer'";
            $bild = mysqli_query($connection, $selectbild);
            echo "<div class='hdiv'>"; //kompeltte seite
            echo "<section class='nutzerInfos'>"; //Section Nutzerinfos
            echo '<form  class="bildform" action="hochladen.php" method="POST" enctype="multipart/form-data">
                  <input type="file" name="datei" id="inputfile">
                  <label for="inputfile"> Bild selektieren </label>
                  <button type="submit" name="submit"> Bestätigen </button>
            </form>';
            while($bildselect = mysqli_fetch_assoc($bild)){     //schleife durch die tabele nutzerbilder
              echo "<div class='profilbildcontainer'>";
              if ($bildselect['status'] == 0){
                echo "<img src='Uploads/profile".$aktuser.".jpeg?'".mt_rand().">";
                  }
              else {
                 echo '<img src="img/no-photo.png" />';
               }
              echo "</div>";
  }
  echo "<div class='nutzerinfo'>";
  echo "<h1> Profil von:</h1>";
  echo $bn['bspitzname'];
  echo "<br>";
  echo "E-mail:";
  echo "<br>";
  echo $bn["bemail"];
  echo "</div>";

  echo"</section>";
     }

  }
  //if($_SERVER['REQUEST_METHOD'] == "POST"){
    //$rezepttextarea = new Betrag();
    //$res = $rezepttextarea->rezeptposten($aktuser , $_POST);
    if(isset($_POST['posten'])){
    $textareaValue = $_POST['rezepttextarea'];
    $rezeptitl = $_POST['rezeptitel'];
    $zutaten = $_POST['zutate'];

  //  $sql = "INSERT INTO post (reztitel, texte, benutzId) values ('$rezeptitl','$textareaValue', $uid)";
  //	$rs = mysqli_query($connection, $sql);

    /*bild hochladen*/
    $datei = $_FILES['file'];  /* Infos übers Datei*/
    /*print_r($datei);*/
    $dateiName = $_FILES['file']['name'];
    $dateiTmp = $_FILES['file']['tmp_name'];   /*Adresse*/
    $dateiGroesse = $_FILES['file']['size'];
    $dateiError = $_FILES['file']['error'];
    $dateiType = $_FILES['file']['type'];

    $dateiext = explode('.', $dateiName);
    $dateiselected = strtolower(end($dateiext));

    $erlaubtedatei = array('jpg', 'jpeg', 'png');

    if(in_array($dateiselected, $erlaubtedatei)) {
      if($dateiError === 0){
        if($dateiGroesse < 7000000) {
           $hochgeladen = 'rezbild'.".".rand().".".$dateiselected;  //neue name geben mit rand nummer um unique zu sein
           $dateiplatz = 'Uploads/'.$hochgeladen;
           move_uploaded_file($dateiTmp, $dateiplatz); // datei nach Uploads schicken
           $sql = "INSERT INTO post (reztitel, texte, benutzId, rezeptbild, zutaten, kommcount) values ('$rezeptitl','$textareaValue', $uid, '$hochgeladen', '$zutaten', 0);";
           $res = mysqli_query($connection, $sql);
          // echo "ok";
        }else {
          echo " Datei zu Groß !! ";
          exit();
        }
      }
    }

    if($res){
      /*selectpost*/
      $sqsel = "SELECT * FROM post ORDER BY id DESC LIMIT 1";
      $rsel = mysqli_query($connection, $sqsel);
      $n = mysqli_fetch_array($rsel);
      $poid = $n['id'];
      $sqlike = "INSERT INTO postlike (likecount, dislikecount,postID) values (0, 0,'$poid');";
      $rslike = mysqli_query($connection, $sqlike);
    }
  //  echo $textareaValue;
  //  echo $rezeptitl;
  //  echo "userid";
  //  echo $uid;
  }

  $colecte = "SELECT * FROM post where benutzId = '$uid';";
  $rscolecte = mysqli_query($connection, $colecte);

  ?>
  <section class="postcontentcontainer">
    <div style="margin: 10px auto; width: min-content; height: min-content; text-align: center; flex:2.5; padding:20px; /*background-color:cyan;*/">
             <div class="meinpost">
               <form class="rezeptform" action="profil.php" method="post" enctype="multipart/form-data">
                 <div class="rezepttitel">
                   <textarea name="rezeptitel" rows="1" placeholder="Rezept Titel" style="max-height: 30px; width:500px;"></textarea>
                 </div>
                 <textarea name="zutate" rows="8" cols="80" placeholder="zutaten eingeben" ></textarea>
                 <textarea name="rezepttextarea" rows="8" cols="80" placeholder="Zubereitung"></textarea>
                 <br>
                 <input type="file" name="file" id="rezb">
                 <label for="rezb"> Bild suchen </label>
                 <br>
                 <button class="postbutton" type="submit" name="posten" > Posten </button>
                 <br>
               </form>
             </div>

             <div class="postrahmen">
                 <h1>meine Gerichte</h1>
              <?php
                 $i = 0;
                 if($rscolecte)
                    {
                      foreach ($rscolecte as $value) {
                      echo'  <div id="test'.$i.'>';
                      include 'userpost.php';
                      $i++;
                      echo '</div>';
                    }
                   }
                  ?>
             </div>
      </div>

  </section>

</div>

</div>




    <?php
        include 'HTML/footer.html';
     ?>



</body>
</html>
