<?php
$aktuser = $_SESSION["un"];
$uid = $_SESSION["userd"];


/*class Betrag {

  function rezeptposten($uid , $t){
    $connection = mysqli_connect("localhost", "root", "", "leckerschmecker");
    if(!empty($t['rezepttextarea'])){
        $para = addslashes($t['rezepttextarea']);
        //$id = $this->rezept_id();

        $query = "INSERT INTO posts (benutzerId, paragraf, ) values ($uid, '$para');";

        $res = mysqli_query($connection, $query);
        echo "ok";
        }else{
      echo "noch leeer";
    }
  }

/*  private function rezept_id(){
    $len = rand(1,19);
    $num = "";
    for ($i=0; $i < $len; $i++){
      $nrand = rand(0,9);
      $num = $num . $nrand;
    }
    return $num;
  }*/

//}
