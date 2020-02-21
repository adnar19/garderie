<?php

if (isset($_GET['deconnexion'])) {
  setcookie("uid", null, time()- 120,"/", "", 0);
  setcookie("role", null, time()- 120,"/", "", 0);
  unset($_COOKIE['uid']);
  unset($_COOKIE['role']);
  sleep(1);
}
if (isset($_COOKIE['uid'])) {
$uid = $_COOKIE['uid'];
$role = $_COOKIE['role'];

} else {
  include 'connexion.php';
  die();
}





//
//
// $utilisateur = $_COOKIE['utilisateur'];
//
// include 'config.php';
//
// $conecte = false;
// $role='1';
// $result_one = $file_db->query("SELECT * FROM users");
// foreach($result_one as $row) {
// if ( $row['nom'].$row['pwd']  == $utilisateur)
// $conecte = true;
//
// $role=$row['role'];
// }
//
//
// if (!$conecte) {
//    // print $utilisateur;
//  include 'connexion.php';
//  die();
// }








 ?>
