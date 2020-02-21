<?php

$id =  $_POST['id'];

include '../config.php';


$file_db->exec("DELETE FROM parents WHERE id='$id'");

$file_db->exec("DELETE FROM enfants WHERE id_parents='$id'");
$file_db->exec("DELETE FROM gt WHERE id_parent='$id' AND temp IS NULL");

print_r($_POST);

 ?>
