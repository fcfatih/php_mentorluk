<?php
include "config/ayarlar.php";
include "config/db.php";
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Öğrenciler</title>
</head>
<body>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Aydın</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Ana Sayfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ekle.php">Ekle</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sil.php">Sil</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="guncelle.php">Güncelle</a>
      </li> 
    </ul>
  </div>  
</nav>
<br>

<?php
  $id = -1;
  $ogrenciNo = 0;
  $ogrenciAdi = "";
  $ogrenciSoyadi = "";
  $sinifi = "";
  try{
    //id ye gore bilgileri cekip form elemanlarina yaziorum
    if(!empty($_GET)){
      $id = $_GET["id"];
      $sql = "select * from ogrenciler where id = :id";
      $stmt = $db->prepare($sql);
      //gelen bilgileri sql sorgusuna baglama
      $stmt->bindParam(":id",     $id);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //print_r($result);
      $ogrenciNo = $result[0]["ogrenciNo"];
      $ogrenciAdi = $result[0]["ogrenciAdi"];
      $ogrenciSoyadi = $result[0]["ogrenciSoyadi"];
      $sinifi = $result[0]["sinifi"];
      $db = null;
    }

    try{
      if(!empty($_POST)){
          print_r($_POST);
          //guncelleme islemi
          $sql = "update ogrenciler set ogrenciNo = :ogrNo, ogrenciAdi = :ogrAdi, ogrenciSoyadi =  :ogrSoyadi, sinifi = :sinif where id = :id";
          $stmt = $db->prepare($sql);
          //gelen bilgileri sql sorgusuna baglama
          $stmt->bindParam(":ogrNo",     $_POST["ogrenciNo"]);
          $stmt->bindParam(":ogrAdi",    $_POST["ogrenciAdi"]);
          $stmt->bindParam(":ogrSoyadi", $_POST["ogrenciSoyadi"]);
          $stmt->bindParam(":sinif",     $_POST["ogrenciSinifi"]);
          $stmt->bindParam(":id",        $_POST["id"]);
          $stmt->execute();
          $db = null;
          //ekleme tamalnadiysa sayfayi ana sayfaya yonlendir
          header("Location: index.php");
      }
  }catch(PDOException $e){
      echo($e->getMessage());
  }
  }catch(PDOException $e){
    echo($e->getMessage());
  }  
?>

<div class="container">
<h1>Guncelle</h1>
<form action="guncelle.php" method="POST">
    <div class="form-group">
        <label for="ogrenciNo">Ogrenci No:</label>
        <input type="text" class="form-control" 
        placeholder="Ogrenci No" 
        name="ogrenciNo">
    </div>
    <div class="form-group">
        <label for="ogrenciAdi">Ogrenci Adı:</label>
        <input type="text" class="form-control" 
        placeholder="Ogrenci Adı" 
        name="ogrenciAdi"
        value="<?php echo $ogrenciAdi;?>">
    </div>
    <div class="form-group">
        <label for="ogrenciSoyadi">Ogrenci Soyadı:</label>
        <input type="text" class="form-control" 
        placeholder="Ogrenci Soyadı" 
        name="ogrenciSoyadi"
        value="<?php echo $ogrenciSoyadi;?>">
    </div>
    <div class="form-group">
        <label for="ogrenciSinifi">Sınıfı:</label>
        <input type="text" class="form-control" 
        placeholder="Sinifi" 
        name="ogrenciSinifi"
        value="<?php echo $sinifi;?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    

    <button type="submit" class="btn btn-primary">Guncelle</button>
  </form>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
