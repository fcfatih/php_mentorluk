<?php
include "config/ayarlar.php";
include "config/db.php";

try{
  if(!empty($_GET)){
      //ekleme islemi
      $sql = "delete from ogrenciler where id = :id";
      $stmt = $db->prepare($sql);
      //gelen bilgileri sql sorgusuna baglama
      $stmt->bindParam(":id",     $_GET["id"]);
      $stmt->execute();
      $db = null;
  }
}catch(PDOException $e){
  echo($e->getMessage());
}

header("Location: index.php");

?>
