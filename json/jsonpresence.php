<?php
 $data = array();
include '../config.php';


$result_one = $file_db->query("SELECT * FROM prix WHERE tmps <> '' ORDER BY tmps ASC ");
foreach($result_one as $row) {
 $data['listedesprix'][]  = $row;
}

$enfants = array();
$result_one = $file_db->query("SELECT id_enfant,SUM(temp) AS st FROM gt GROUP BY id_enfant ");
foreach($result_one as $row) {
 $enfants[$row['id_enfant']]  = $row['st'];
}



$enfanN = array();

$result_one = $file_db->query("SELECT *,
  (SELECT nom || '::' || prenom || '::' || etat FROM enfants WHERE gt.id_enfant = enfants.id ) AS enfant,
   (SELECT nom || '::' || prenom || '::' || tel || '::' || ncarte|| '::' || type || '::' || cartes || '::' || solde FROM parents WHERE gt.id_parent= parents.id ) AS parent FROM gt WHERE date_s IS NULL ");
foreach($result_one as $row) {
  if (array_key_exists($row['id_parent'], $enfanN)) {
    $enfanN[$row['id_parent']]= $enfanN[$row['id_parent']] + 1;
  } else {
$enfanN[$row['id_parent']] = 1;
  }

  $row['enfant_numero'] = $enfanN[$row['id_parent']];
  $row['ta'] = $enfants[$row['id_enfant']];
 $data['liste'][]  = $row;
}



  $json = json_encode( $data);
header("Content-type: application/json");
exit(  $json );
  ?>
