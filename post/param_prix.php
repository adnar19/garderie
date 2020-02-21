<?php

$id =  $_POST['id'];
$key=  $_POST['key'];
$value =  $_POST['value'];
include '../config.php';


$file_db->exec("UPDATE prix SET $key=$value WHERE id=$id ;") OR print_r($file_db->errorInfo());

print_r($_POST);

 ?>
