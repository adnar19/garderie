<?php

$id =  $_POST['id'];

include '../config.php';


$file_db->exec("DELETE FROM enfants WHERE id='$id'");

print_r($_POST);

 ?>
