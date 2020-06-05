<?php
$db = null;
try{
    $db = new PDO('mysql:host='.$GLOBALS['db_server'].';dbname='.$GLOBALS['db_name'], $GLOBALS['db_user'],$GLOBALS['db_pass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
}catch (PDOException $e){
    print $e->getMessage();
}

