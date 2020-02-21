<?php
include '../config.php';

 $data = array();
$result_one = $file_db->query("SELECT * FROM users");
 foreach($result_one as $row) {

 $data[] = $row;

 }





  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
 ?>
