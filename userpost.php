<?php
include_once "dislike.php";
$sellike = mysqli_query($connection,"SELECT * From postlike");
$li = mysqli_fetch_array($sellike);
$likes = $li['likecount'];
 ?>

<!DOCTYPE html>
<html dir="ltr">
  <head>
     <meta charset="UTF-16">
     <title> Online Rezeptbuch </title>
     <link type="text/css" rel="stylesheet" href="style.css">
     <script type="text/javascript" src="main.js"></script>

     <script type="text/javascript">
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
            <div class="hauptpost">
              <div class="rezeptarea">
                <img class="rezeptbild" src="Uploads/<?php echo ($value['rezeptbild']); ?>"> </img>
                <div class="namedesrezeptes">
                  <p>
                     <?php echo $value['reztitel'];?>
                  </p>
                </div>

                <div id="recette" class="rezeptcontainer">
                  <p>
                    Zutaten:
                    <br>
                    <?php echo nl2br($value['zutaten']);?>
                  </p>
                  <hr>
                  <p>
                    Zubereitung:
                    <br>
                    <?php
                        echo nl2br($value['texte']);
                     ?>
                  </p>
                  <br>
                  <div class='logreg' onclick="down(document.getElementById(id='test<?php $i?>').parentElement.innerText,'download.txt')"
                       style='background-image: url(img/download-2.png); max-height:40px; margin-bottom=5px;'></div>
                </div>
                <div class="likecomsprofil">
                  <?php $idpos = $value['id']?>
                  <span>  <input type="image" src="img/parenting.png" style="height:30px; weight:30px; margin-left:20px;"  value="likes">
                    <a >
                      <?php
                        $sellike = mysqli_query($connection,"SELECT * From postlike where postId='$idpos'");
                        $li = mysqli_fetch_array($sellike);
                        $likes = $li['likecount'];
                        echo $likes ?> gefällt mir
                   </a>
                 </span>
                  <span>  <a href="kommszeigen.php?id=<?php echo $value['id']?>  "> <input type="image" src="img/comment.png" style="height:30px; weight:30px; margin-left:30px;">

                       <?php
                        $sellike = mysqli_query($connection,"SELECT * From post where id='$idpos'");
                        $li = mysqli_fetch_array($sellike);
                        $komms = $li['kommcount'];
                        echo $komms ?>
                      </a>
                  </span>
                </div>
                <span>
                  <a href="bearbeiten.php?id=<?php echo $value['id']?>" > <img src="img/edit.png" style="height:30px; weight:30px;"/> </a>
                  <a onClick="return confirm('sind Sie sicher?')" href="dbconn/löschen.php?id=<?php echo $value['id']?>"> <img src="img/delete.png" style="height:30px; weight:30px; margin-left:15px">  </a>
                </span>
              </div>
              <hr>
            </div>
