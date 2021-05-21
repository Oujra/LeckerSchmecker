<?php
    include 'header.php';
    include_once 'dbconn/datenbankVerbindung.php';
    if (isset($_SESSION["un"])){
    $aktuser = $_SESSION["un"];
    $uid = $_SESSION["userd"];


if(isset($_GET["textrezept"])){
      $id = $_GET["textrezept"];
  		$kommentieren = true;
      $result = mysqli_query($connection,"SELECT * FROM post Where id=$id");
      $row = mysqli_fetch_array($result);
//      echo $id;
      $bild = $row['rezeptbild'];
      $idpos = $row['id'];
//      echo "    ";
//      echo $bild;
}
 }
else {
        $id = $_GET["textrezept"];
    		$kommentieren = true;
        $result = mysqli_query($connection,"SELECT * FROM post Where id=$id");
        $row = mysqli_fetch_array($result);
  //      echo $id;
        $bild = $row['rezeptbild'];
        $idpos = $row['id'];
  //      echo "    ";
  //      echo $bild;
}

?>

<body>
<!DOCTYPE html>
<html dir="ltr">
  <head>
     <meta charset="UTF-16">
     <link type="text/css" rel="stylesheet" href="../style.css">
     <script type="text/javascript">
     /* Kein eigenes Code  von stackoverflow*/
     function down(textToWrite, fileNameToSaveAs)
      {
             var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
             var downloadLink = document.createElement("a");
             downloadLink.download = fileNameToSaveAs;
             downloadLink.innerHTML = "Download File";
             if (window.webkitURL != null)
             {
               downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
             }
             downloadLink.click();
    }
     </script>
  </head>

  <div class="behalter" >
        <div style="height:30%;">
          <img class="img" src="Uploads/<?php echo $bild; ?>"> </img>
          <h1 style="margin: auto 30px;"><?php echo $row["reztitel"]; ?></h1>
        </div>
        <hr>
        <div class="autofetch"><p> Zutaten: <br> <?php echo nl2br($row["zutaten"]); ?></p>
                              <hr>
                               <p> Zubereitung: <br>  <?php echo nl2br($row["texte"]); ?></p>


        <div class='logreg' onclick="down(document.getElementById(id='test<?php $i?>').parentElement.innerText,'download.txt')"
              style='background-image: url(img/download.png); max-height:40px;'> </div>
        </div>


      <div class="likecoms">
        <span>
        <a href="dbconn/likes.php?id=<?php echo nl2br($row["id"])?>" style="margin-right:10px;"> <img src="img/heart.png" style="height:25px; weight:25px;">
          <?php
            $sellike = mysqli_query($connection,"SELECT * From postlike where postId='$idpos'");
            $li = mysqli_fetch_array($sellike);
            $likes = $li['likecount'];
            echo $likes ?>
          </a>
        <a href="dbconn/dislike.php?id=<?php echo nl2br($row["id"])?>" > <img src="img/dislike.png" style="height:25px; weight:25px; ">
          <?php
           $sellike = mysqli_query($connection,"SELECT * From postlike where id='$idpos'");
           $li = mysqli_fetch_array($sellike);
           $dislike = $li['dislikecount'];
           echo $dislike ?>
         </a>
        <a href="kommszeigen.php?id=<?php echo nl2br($row["id"])?>"> <img src="img/comment.png" style="height:30px; weight:30px; margin-left:10px;">
          <?php
           $sellike = mysqli_query($connection,"SELECT * From post where id='$idpos'");
           $li = mysqli_fetch_array($sellike);
           $ben = $li['benutzId'];
           $komms = $li['kommcount'];
           echo $komms;
           ?>
        </a>
       </span>
      </div>

      <form action="dbconn/kommentieren.php?id=<?php echo $id?>" method="post">
        <textarea name="kommtext" rows="8" cols="80" placeholder="Kommentieren"></textarea>
        <br>
        <input type="submit" name="kommentieren" value="ok">
      </form>

    </div>

    <?php
        include 'HTML/footer.html';
     ?>
