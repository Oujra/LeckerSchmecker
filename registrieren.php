<?php
    include 'header.php';
 ?>


          <div class="register">
            <div class="titel">Register</div>
            <div class="div-form-register">
              <form class="registerform" action="dbconn/register.dbconn.php" method="post">
                <div class="feld">
                  <input type="text" name="nachname" placeholder="Nachname" required>
                </div>
                <div class="feld">
                  <input type="text" name="vorname" placeholder="Vorname" required>
                </div>
                <div class="feld">
                  <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="feld">
                  <input type="text" name="benname" placeholder="Benutzername">
                </div>
                <div class="feld">
                  <input type="password" name="pswt" class="pass"placeholder="password" required>
                </div>
                <div class="feld">
                  <input type="password" name="pswtwieder" class="passw" name="" value="" placeholder="password wiederholen" required>
                </div>
                <div class="feld">
                  <input class="subbtn" name="bestätigen" type="submit" value="Bestätigen">
                </div>
              </form>
            </div>
            <?php
              if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                  echo "Feld leer";
                }
                else if ($_GET["error"] == "esgibtabweichungenbeimpass"){
                  echo "passwort inkorretkt";
                }
                else if ($_GET["error"] == "none"){
                  echo "Hurraaaa wilkommen";
                }
              }
             ?>
          </div>
        </main>



        <?php
            include 'HTML/footer.html';
         ?>

  </body>
</html>
