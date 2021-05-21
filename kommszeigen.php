<?php
  include 'header.php';
  include_once 'dbconn/datenbankVerbindung.php';
  $idposte = $_GET['id'];
//  echo $idposte;
     $aktuser = $_SESSION["un"];
     $uid = $_SESSION["userd"];
     $result = mysqli_query($connection,"SELECT * FROM post Where id='$idposte'");
     $row = mysqli_fetch_array($result);
     $bild = $row['rezeptbild'];
 ?>

 <body>
 <!DOCTYPE html>
 <html dir="ltr">
   <head>
      <meta charset="UTF-16">
      <link type="text/css" rel="stylesheet" href="../style.css">
   </head>

   <div class="behalter" >
         <div style="height:33%;">
           <img class="img" src="Uploads/<?php echo $bild; ?>"> </img>
           <h1 style="margin: 1px 30px;"><?php echo $row["reztitel"]; ?></h1>
         </div>
         <hr>

       <div style="width:370px; height:50px, padding:10px">
         <span style=" display:block; width:90%; height:50px; margin:0 auto;">
         <a style="margin-right:40px;"> <img src="img/heart.png" style="height:25px; weight:25px; margin-right:2px;">
           <?php
             $sellike = mysqli_query($connection,"SELECT * From postlike where postId='$idposte'");
             $li = mysqli_fetch_array($sellike);
             $likes = $li['likecount'];
             echo $likes ?> gefällt mir
           </a>
         <a style="margin-right:40px;"> <img src="img/dislike.png" style="height:25px; weight:25px;">
           <?php
            $sellike = mysqli_query($connection,"SELECT * From postlike where id='$idposte'");
            $li = mysqli_fetch_array($sellike);
            $dislike = $li['dislikecount'];
            echo $dislike ?>
         </a>
         <a> <img src="img/comment.png" style="height:25px; weight:25px; margin-left:40px; margin-right:5px;">
           <?php
            $sellike = mysqli_query($connection,"SELECT * From post where id='$idposte'");
            $li = mysqli_fetch_array($sellike);
            $ben = $li['benutzId'];
            $komms = $li['kommcount'];
            $selben = mysqli_query($connection,"SELECT * From benutzertabelle where bId='$ben'");
            $lb = mysqli_fetch_array($selben);
            $bname = $lb['bspitzname'];
            echo $komms;
            ?>
         </a>
        </span>
       </div>
       <hr>
       <div class="komms">
         <p>    <?php
                $koments = mysqli_query($connection,"SELECT * FROM Kommentare Where postid='$idposte'");
                $i=0;
                while($erg = mysqli_fetch_array($koments)){
                  $komentiert = $erg['benId'];
                  $selben = mysqli_query($connection,"SELECT * From benutzertabelle where bId='$komentiert'");
                  $erg2 = mysqli_fetch_array($selben);
                  $ben = $erg2['bspitzname'];
                echo '<div>';
                echo "Am " .$erg['date'];
                echo "  schreibt : " .$ben;
                echo "<br>";
                echo $erg['kommentartext'];
                echo "<hr>";
                $i++;
                echo '</div>';
              }
                ?>
              </p>
       </div>


       </div>
     </div>

</body>










<?php
    include 'HTML/footer.html';
 ?>
