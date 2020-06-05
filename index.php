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



<div class="container">
    <br>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Öğrenci No</th>
                <th scope="col">Adı</th>
                <th scope="col">Soyadı</th>
                <th scope="col">Sınıfı-Şubesi</th>
                <th scope="col">Islemler</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $ogrenciler = $db->query("SELECT * FROM ogrenciler");
            $ogrSay = $ogrenciler->rowCount(); //kayıt sayısı
            $ogr =    $ogrenciler->fetchAll(); //sorguya uyan tüm kayıtlar
            foreach ($ogr as $o){
                echo '<tr>';
                    echo '<td>'.$o['id'].'</td>';
                    echo '<td>'.$o['ogrenciNo'].'</td>';
                    echo '<td>'.$o['ogrenciAdi'].'</td>';
                    echo '<td>'.$o['ogrenciSoyadi'].'</td>';
                    echo '<td>'.$o['sinifi'].'</td>';
                    echo "<td><a href='sil.php?id=".$o['id']."'>Sil</a>  <a href='guncelle.php?id=".$o['id']."'>Guncelle</a></td>";
                echo '</tr>';
            }
            $db = null;
            ?>
            </tbody>
        </table>
        Bu listede toplam <?php echo $ogrSay;?> öğrenci bulunmaktadır
    </div>
    <br>
    <a href="ornek.php">ornek</a>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
