<?php
    include 'header.php';
 ?>


<!-- login -->
      <main>
          <div class="login">
            <div class="titel">Login</div>
            <div class="div-form-login">
              <form class="loginform" action="dbconn/login.dbconn.php" method="post">
                <label for=""> Benutzername </label>
                <div class="feld">
                  <input type="text" name="benname" placeholder="Benutzername" required>
                </div>
                <label for=""> Passwort </label>
                <div class="feld">
                  <input type="password" name="pswt" placeholder="password" required>
                </div>
                <div class="check">
                  <input type="checkbox" class="dverm" id="datenvermerken" name="vehicle1" value="Nutzerdaten vermerken"> Persönnliche Daten vermerken
                  <span class="checkmark"></span>
                </div>
                <div >
                  <h1 style="color:red; font-size:18px;"">
                    <?php
                      if(isset($_GET['error'])){
                        switch ($_GET['error']) {
                          case 'falshepass':
                          echo "falsches Passwort";
                          break;
                          case 'loginunmöglich':
                            echo "Nicht registrierte Email bzw. Benutzername";
                            break;
                        }
                      }
                      ?>
                  </h1>


                </div>
                <div class="passvergessen"><a href="passzurucksetzen.php">Passwort vergessen ?</a></div>
                <div class="feld">
                  <input class="subbtn" type="submit" name="anmelden" value="Anmelden">
                </div>
                <div class="kkonto"> <h5> Noch kein Konto ? <a href="registrieren.php"> werde einer von uns</a> </h5></div>
              </form>
            </div>
          </div>
        </main>



        <?php
            include 'HTML/footer.html';
         ?>

  </body>
</html>
