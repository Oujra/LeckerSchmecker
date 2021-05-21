<?php
    include 'header.php';
    include_once 'dbconn/datenbankVerbindung.php';
    $result = mysqli_query($connection,"SELECT * FROM post order by RAND() limit 10");
 ?>
 <!DOCTYPE html>
 <html dir="ltr">
   <head>
      <meta charset="UTF-16">
      <title> Online Rezeptbuch </title>
      <script type="text/javascript">
      function down(textToWrite, fileNameToSaveAs)
       {
              var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
              var downloadLink = document.createElement("a");
              downloadLink.download = fileNameToSaveAs;
              downloadLink.innerHTML = "Download File";
              if (window.webkitURL != null)
              {
                // Chrome allows the link to be clicked
                // without actually adding it to the DOM.
                downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
              }

              downloadLink.click();
     }
      </script>
   </head>

    <main>
      <!-- Section -->
        <section class="section1">
          <div class="textzentrieren">
            <h2>Dimmi quel che mangi <br> e ti dirò chi sei</h2>
            <h1>Sag, was du isst und ich weiß,<br> was du fühlst</h1>
          </div>
        </section>
        <!-- Section -->

        <div class="wrapper">
          <section class="section2">
            <a href="rezeptdestages.php"><div class="box1">
              <h3>Rezept des Tages</h3>
            </div></a>
            <a href="bildergalerie.php"><div class="box2">
              <h3> Bilder Galerie </h3>
            </div></a>

            <?php
                if (isset($_SESSION["un"])){
                  echo '<a href="profil.php"> <div class="box2"> <h3> Profil </h3> </div></a>';
                }
                else {
                  echo '<a href="login.php"> <div class="box2"> <h3> Profil </h3> </div></a>';
                }
             ?>

            <a href="#"><div class="box1">
              <h3> . </h3>
            </div></a>

          </section>
          <br>
          <hr>
        </div>


          <!--  Random posten -->
        <div class="wrapper3">
          <div style="width:400px; height:50px; margin: 15px auto;text-align: center; justify-content: center;display: block;text-transform: uppercase;">
                    <h1 style="font-family: Arial; font-size:24px; margin:auto;">Unsere Empfehlung</h1>
          </div>

          <section class="section3">
              <?php
              $i=0;
                while($row = mysqli_fetch_array($result)) {
                  echo'<div class="behalter1">';
                    ?>
                        <div style="height:65%; overflow: hidden; background-position: center; background-size: cover;">
                          <a href="post.php?textrezept=<?php echo nl2br($row["id"])?>">
                            <img  src="Uploads/<?php echo ($row['rezeptbild']); ?>"> </img>
                          </a>
                        </div>
                          <hr>
                          <h1 style="margin: auto 30px; font-size:20px;"><?php echo $row["reztitel"]; ?></h1>
                        <?php
                  echo'</div>';
                        $i++;
                      }
               ?>
          </section>
          <hr>
        </div>


    </main>


    <?php
        include 'HTML/footer.html';
     ?>
