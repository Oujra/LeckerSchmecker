<?php
    include 'header.php';
 ?>


          <div class="register">
            <div class="titel"> Passwort zurücksetzen </div>
            <hr>
            <p>Bitte geben Sie Ihre E-Mail-Adresse oder Benutzer Name ein, um nach irhrem Konto zu suchen.</p>
            <hr>
            <form action="dbconn/zurucksetzen.php" method="post">
              <label> E-Mail-Adresse/Benutzer Name  </label>
              <br>
              <br>
              <input type="email" name="emailoderbname" value="" required>
              <br>
              <button type="submit" name="linksenden"> Link senden </button>
            </form>

          </div>
        </main>



        <?php
            include 'HTML/footer.html';
         ?>

  </body>
</html>
