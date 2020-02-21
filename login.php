<?php

include 'config.php';
$utilisateur = $_POST['utilisateur'];
$pass = $_POST['motdepasse'];
$pass = md5($pass);



//1' OR pwd <> '0


$sql = "SELECT * FROM utilisateur WHERE nom LIKE '$utilisateur' AND pwd ='$pass'";

$trouve = false;
$result_one = $file_db->query("$sql");
foreach($result_one as $row) {
$trouve = true;
}


if ($trouve) {
print $utilisateur.$pass;
} else {
  print 0;
}

 ?>
