Bu günkü müfredat

php myadmin adresi
http://localhost/phpmyadmin/

sayfaya baglanti ekleme (farkli sayfalara gecis)

<a href="ekle.php">Ekle</a>

sayfaya parametreli baglanti ekleme
<a href="sil.php?id=1">Sil</a>

menu ekleme
(bootstrap navigation)

secme-listeleme
select * from tablo_adi

html form

ekleme sql
insert into tablo_adi (column1, column2) VALUES ('data1', 'data2');
insert into tablo_adi VALUES ('data1', 'data2');
INSERT INTO `ogrenciler` 
(`id`, `ogrenciNo`, `ogrenciAdi`, `ogrenciSoyadi`, `sinifi`) 
VALUES 
(NULL, '10', 'erwefer', 'wefrrwe', '5-B'), 
(NULL, '4', 'df24f', 'fw4', '6-C');

silme
delete from tablo_adi where id=1;

guncelleme
update tablo_adi set column1  = guncelenecek bilgi where id = 1 



