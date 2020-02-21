<?php
 $data = array();
include '../config.php';



$result_one = $file_db->query("SELECT * FROM prix");
foreach($result_one as $row) {
 $data[]  = $row;
}



  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
