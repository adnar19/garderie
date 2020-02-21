<?php

$data =  $_REQUEST['data'];
$ds = date('Y-m-d H:i:s');
$data = explode(':',$data);
print_r($data);

$montant = 0;
include '../config.php';

$file_db->beginTransaction();
for ($i=0; $i <count($data) ; $i++) {
  list($idgt,$prix,$temp,$idp) = explode('-',$data[$i]);

//   $result_one = $file_db->query("SELECT *,(SELECT solde FROM parents WHERE parents.id = gt.id_parent  ) AS csolde  FROM gt  WHERE id=$idgt)");
//
//   foreach($result_one as $row) {
//     $idp = $row['id_parent'];
//     $solde = $row['csolde'];
//   }
//   if ($solde > 0) {
//     $solde-= $prix;
//     $file_db->exec("UPDATE parents SET solde='$solde' WHERE id=$idp ;") OR print_r($file_db->errorInfo());
// $montant += (($prix - $solde) > 0 ?$prix - $solde : 0);
//   } else {
// $montant += $prix;
//   }


 $file_db->exec("UPDATE gt SET temp='$temp',prix='$prix',date_s='$ds' WHERE id=$idgt ;") OR print_r($file_db->errorInfo());
 $file_db->exec("UPDATE parents SET cartes='' WHERE type='0' AND id='$idp' ;") ;
}


// print $montant;
$file_db->commit();







 ?>
