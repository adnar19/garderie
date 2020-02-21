<?php

$id =  $_POST['id'];


include '../config.php';


$file_db->exec("UPDATE stock SET quantite=quantite-1 WHERE id=$id ;") OR print_r($file_db->errorInfo());








 ?>
