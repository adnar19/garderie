<?php
$data = array();
 $solde = array();
$d1= $_GET['d1'];
$d2= $_GET['d2'];



include '../config.php';


// $result_one = $file_db->query("SELECT * FROM gt g, parents p WHERE g.id_parent= p.id AND g.prix <> '0' AND (g.date_s BETWEEN '$d1' and  '$d2')");
$result_one = $file_db->query("SELECT *,(select type  FROM parents WHERE parents.id = gt.id_parent) AS type ,(select nom ||' '|| prenom  FROM parents WHERE parents.id = gt.id_parent) AS parent FROM gt   WHERE ( date_s BETWEEN '$d1' and  '$d2 23:59:59')");
foreach($result_one as $row) {

 $data['gt'][]  = $row;
}

$result_two = $file_db->query("SELECT *,(SELECT nom || '  ' || prenom FROM parents  WHERE parents.id = solde.idp) AS parent FROM solde WHERE ( date BETWEEN '$d1' and  '$d2 23:59:59')");
foreach($result_two as $row) {

 $data['solde'][]  = $row;
}


  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
