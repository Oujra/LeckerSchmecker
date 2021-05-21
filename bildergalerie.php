<?php
    include 'header.php';
    include_once 'dbconn/datenbankVerbindung.php';
    $result = mysqli_query($connection,"SELECT * FROM post order by RAND() limit 6");
 ?>

 <html dir="ltr">
   <head>
      <meta charset="UTF-16">
      <title> Bilder Galerie </title>
   </head>
   <body>
     <div class="wrapper3">
       <div style="margin: 15px auto; background-color:gray;text-align: center; ">
                 <h1 style="font-family: RobotoMono; font-size:20px; margin:auto;">Galerie</h1>
       </div>

       <section class="secbildgal">

           <?php
           $i=0;
             while($row = mysqli_fetch_array($result)) {
               echo'<div class="imggalbehalter">';
                 ?>
                     <div style="height:90%;margin:10px 10px; overflow-x: hidden; background-position: center; background-size: cover;">
                       <a href="post.php?textrezept=<?php echo nl2br($row["id"])?>">
                         <img  src="Uploads/<?php echo ($row['rezeptbild']); ?>"> </img>
                       </a>
                     </div>
                     <?php
                     echo'</div>';
                     $i++;
                   }
            ?>
       </section>
     </div>


     <?php
     include 'HTML/footer.html';
     ?>
