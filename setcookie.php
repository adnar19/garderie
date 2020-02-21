<?php
$uid= $_POST['uid'];
$role= $_POST['role'];


// setcookie("utilisateur", $username, time()+360000,"/", "", 0);
// setcookie("motdepasse", $password, time()+360000,"/", "", 0);
setcookie("uid",$uid, time()+360000,"/", "", 0);
setcookie("role",$role, time()+360000,"/", "", 0);






 ?>
