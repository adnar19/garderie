<?php

include "config.php";
$id=$_COOKIE['uid'];

$oldpass=md5($_POST["oldpass"]);

$newpass1= md5($_POST["newpass1"]);

$msg = 'operation efectuee';
if (isset($_POST["oldpass"])) {

$file_db->exec("UPDATE users SET pwd= '$newpass1' WHERE (id = '$id'  AND pwd='$oldpass')") OR $msg = 'mot de passe incorrect';
}



print $msg;

 ?>
