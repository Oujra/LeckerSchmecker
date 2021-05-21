<?php
include 'header.php';

$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];


if(isset($_GET["id"])){
      $i = $_GET["id"];
  		$update = true;
  		$record = mysqli_query($connection, "SELECT * FROM post WHERE id=$i");

  		$n = mysqli_fetch_array($record);
      $bild= $n['rezeptbild'];
  		$rez = $n['texte'];
      $zu = $n['zutaten'];
      $reztitel = $n['reztitel'];
  //    echo "nice";
  }
  ?>


  <div class="postmodifizieren">
    <form  action="dbconn/bearbeitung.php?id=<?php echo $i?>" method="post">
      <div style="height:30%;">
        <img class="img" src="Uploads/<?php echo $bild; ?>"> </img>
      </div>
      <div >
        <textarea name="rezeptitel" rows="1">
          <?php echo $reztitel; ?>
        </textarea>
      </div>
       <input type="hidden"  value="<?php echo $i; ?>">
       <textarea name ="rezzut" rows="8" cols="80">
           <?php echo $zu; ?>
       </textarea>
       <textarea id="rezidtext" name="rezepttextarea" rows="8" cols="80" placeholder="">
          <?php echo $rez; ?>
       </textarea>
       <br>
       <input type="submit" name="bearbeitung" value="bestätigen" id="bear">
       <label for="bear">  bestätigen </label>
       <br>
    </form>
  </div>
  <?php
      include 'HTML/footer.html';
   ?>
