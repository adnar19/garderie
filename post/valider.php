<?php

$id =  $_POST['idgt'];
$temp=  $_POST['temp'];
$prix =  $_POST['prix'];
include '../config.php';
$ds = date('Y-m-d H:i:s');


$file_db->exec("UPDATE gt SET temp='$temp',prix='$prix',date_s='$ds' WHERE id=$id ;") OR print_r($file_db->errorInfo());

print_r($_POST);

 ?>
