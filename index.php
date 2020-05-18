<?php

/*
4 islem yapsin
1-toplama(s1,s2) ekrana sonucu yazsin
2-cikarma(s1,s2) ekrana sonucu yazdirsin, geriye sadece pozitif deger donsun
3-carpma(s1,s2)  geriye sonucu dondursun
4-bolme(s1,s2)   geriye sonucu dondursun, 0 a bolme hatasi vermesin, hata olusursa sadece 0 degerini dondursun

//tek yonlu sifreleme
sifrele($metin) verilen metni sifrelesin. sifreli metni ekrana yazdirsin.
                verilen metni md5 disinda bir sekilde sifrelesin ve geri dondursun.


*/

function topla($s1, $s2){
    $sonuc = $s1 + $s2;
    echo($sonuc);    
}

function cikar($s1, $s2){
    echo($s1 - $s2);
}

function carp($s1, $s2){
    return $s1 * $s2; 
}

function bolme($s1, $s2){
    return $s1 / $s2;
}

function sifrele($metin){
    $sifreli_metin = md5($metin);
    echo($sifreli_metin);
}

function dort_islem($s1, $s2){
    $sonuc = array();
    $sonuc["toplama"] = $s1 + $s2;
    $sonuc["cikarma"] = $s1 - $s2;
    $sonuc["carpma"]  = $s1 * $s2;
    $sonuc["bolme"]   = $s1 / $s2;
    return $sonuc;
}


if(isset( $_POST["form_sayi1"]) && isset( $_POST["form_sayi2"])){
    $sayi1 = $_POST["form_sayi1"];
    $sayi2 = $_POST["form_sayi2"];

    echo("toplam");
    echo("<br>");
    topla($sayi1, $sayi2);
    echo("<br>");

    echo("cikarma");
    echo("<br>");
    cikar($sayi1, $sayi2);
    echo("<br>");

    echo("carpma");
    echo("<br>");
    $sonuc_carpma = carp($sayi1, $sayi2);
    echo($sonuc_carpma);

    echo("<br>");
    echo("bolme");
    echo("<br>");
    $sonuc_bolme = bolme($sayi1, $sayi2);
    echo($sonuc_bolme);

    echo("<br>");
    $s = dort_islem(4,6);
    //print_r($s);
    echo($s["toplama"]);
}

echo("<br>");
if(isset($_POST["form_sifre"])){
    $metin = $_POST["form_sifre"];
    sifrele($metin);
}

?>



<!DOCTYPE HTML>
<html>
<head>
</head>  
<body>

    <h3>Hesap Makinesi</h3>
    <hr>
    <form action="" method="post">
    sayi1 <input type="text" name="form_sayi1">
    <br>
    sayi2: <input type="text" name="form_sayi2">
    <br>
    sifre: <input type="text" name="form_sifre">
    <br>
    <input type="submit">
    </form>
    <hr>

</body>
</html>
