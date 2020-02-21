<?php

$re =  $_POST['re'];
$ra =  $_POST['ra'];
$rs =  $_POST['rs'];
$pwd =  $_POST['pwd'];
include '../config.php';

if ($pwd !== '01230123') {
print 'mot de passe incorrect';
  die();
}

if ($re=='1') {
  $file_db->exec(" DELETE FROM enfants");
  $file_db->exec(" DELETE FROM parents");
  $file_db->exec(" DELETE FROM gt");
}

if ($ra=='1') $file_db->exec("DELETE  FROM achats");
if ($rs=='1'){
$file_db->exec("DELETE  FROM stock");
$file_db->exec("DELETE  FROM achats");
}

$file_db->exec(" VACUUM");
print "opération effectuée";
?>
