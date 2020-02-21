<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$datedenaissance = $_POST['datedenaissance'];
$etat = $_POST['etat'];
$nomP = $_POST['nomP'];
$prenomP = $_POST['prenomP'];
$tel = $_POST['tel'];
$numcd = $_POST['numcd'];
$carte=$_POST['carte'];
include '../config.php';
$idp = $_POST['idp'];
$ide = $_POST['ide'];
$type = $_POST['type'];

$aujourdhui = date('Y-m-d H:i:s');

$f = $file_db->query("SELECT * from gt WHERE id_enfant=$ide AND date_s IS NULL");
foreach($f as $row) {
  die();
}



if ($idp != '0' ){
  $file_db->exec("UPDATE parents SET nom='$nomP',prenom='$prenomP',tel='$tel',ncarte='$numcd',cartes='$carte' WHERE id='$idp' ;") OR print_r($file_db->errorInfo());
} else {
  $file_db->exec("INSERT INTO parents (nom,prenom,tel,ncarte,cartes,type,solde) VALUES ('$nomP','$prenomP','$tel','$numcd','$carte','$type','0') ;") OR print_r($file_db->errorInfo());
  $idp = $file_db->lastInsertId();
}
if ($ide != '0' ){
  $file_db->exec("UPDATE enfants SET nom='$nom',prenom='$prenom',datedenaissance='$datedenaissance',etat='$etat' WHERE id='$ide'  ;") OR print_r($file_db->errorInfo());
}else {

  $file_db->exec("INSERT INTO enfants (nom,prenom,datedenaissance,etat,id_parents) VALUES ('$nom','$prenom','$datedenaissance','$etat','$idp') ;")OR print_r($file_db->errorInfo());

  $ide = $file_db->lastInsertId();
}


$file_db->exec("INSERT INTO gt (id_enfant,date_e,id_parent) VALUES ('$ide','$aujourdhui','$idp') ;") OR print_r($file_db->errorInfo());






print $idp;
 ?>
