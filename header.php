<?php
    session_start();
    include_once 'dbconn/datenbankVerbindung.php';
      if (isset($_SESSION["un"])){
          $uid = $_SESSION["userd"];
          $aktuser = $_SESSION["un"];
          $sqlbenutzer = "SELECT * FROM benutzertabelle WHERE bspitzname = '$aktuser' ";
          $erg = mysqli_query($connection, $sqlbenutzer);
          $bn = mysqli_fetch_assoc($erg); }
 ?>
<!DOCTYPE html>

<html dir="ltr">
  <head>
     <meta charset="UTF-16">
     <title> Online Rezeptbuch </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link type="text/css" rel="stylesheet" href="style.css">
     <link type="text/css" rel="stylesheet" href="logregister.css" >
     <script type="text/javascript" src="main.js"></script>
  </head>


<body>

<header>
  <a href="index.php" class="header-logo"> <img src="img/logo.png"></a>
  <nav>
      <ul>
        <li><a href="index.php"> Home </a></li>
        <li><a href="#"> Über Uns </a></li>
        <li><a href="kontakt.html"> Kontaktiere Uns </a></li>
      </ul>

      <?php

          if (isset($_SESSION["un"])){
            $idnu= $bn['bId'];
            $selectbild = "SELECT * FROM profilblid WHERE benutzerId='$idnu'";
            $bild = mysqli_query($connection, $selectbild);
            $bildselect = mysqli_fetch_assoc($bild);
            if ($bildselect['status'] == 0){
            echo "<img class='togimg' onclick='togglelogbar()' src='Uploads/profile".$aktuser.".jpeg?'".mt_rand()." >";
          /*  echo "<div class='logreg' onclick='togglelogbar()' style='background-image: url(img/in.png);'></div>";*/
          }
          else {
            echo "<img class='togimg' onclick='togglelogbar()' src='img/user.png'></div>";
          }
        }
        else {
          echo "<img class='togimg' onclick='togglelogbar()' src='img/login.png'></div>";
        }
       ?>

  </nav>
</header>


<aside class="loginregsidebar">

  <ul>
    <li> <span> Menu </span> </li>
    <?php
        if (isset($_SESSION["un"])){
          echo "<li> <a href='profil.php'> Profil </a> </li>";
          echo "<li> <a href='dbconn/logout.php'> Auslogen </a> </li>";
        }
        else {
          echo "<li> <a href='login.php'> login </a> </li>";
          echo "<li> <a href='registrieren.php'> Registrieren </a> </li>";
        }
     ?>
     <div class="darkmode">
       <li> <button class="dark" type="button" name="button" onclick="myFunction()"> Dark mode </button>  </li>
     </div>

  </ul>
</aside>
<div id="modal-newsletter" class="modal">
<!-- Modal content -->
    <div class="modal-content">
      <div class="modheader">
        <span class="close">&times;</span>
        <h1> Möchten Sie Neue Rezepte in Ihre Inbox erhalten? Hier den Newsletter abonnieren.</h1>
      </div>
      <form class="newsform" action="index.html" method="post">
        <div class="newsemail">
            <i class="nimg"></i>
            <input class="ebox" ype="email"  placeholder="example@Email" required>
            <button class="ebtn" type="button" value=""> SUB </button>
          </div>
          </form>
        </div>
    </div>

    <div id="löschen-modal" class="modal">
        <h1>Sind Sie Sicher ?</h1>
        <form class="" action="index.html" method="post">
          <input type="submit" name="löschen" value="bestätigen">
        </form>
        </div>
