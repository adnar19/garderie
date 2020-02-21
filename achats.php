<!DOCTYPE html>
<?php
include 'cookies.php';
include "config.php";
include "inc/navbar.php";
if (isset($_POST['button'])) {
$qte = $_POST['qte'];
$prix = $_POST['prix'];
$id_stock= $_POST['id_stock'];
$montant =$qte * $prix;
$aujourdhui= date('Y-m-d H:i');

$file_db->exec("INSERT INTO achats (id_stock,quantite,prix,montant,date) VALUES ($id_stock,'$qte','$prix','$montant','$aujourdhui') ;") OR print_r($file_db->errorInfo());
$file_db->exec("UPDATE stock SET prix='$prix',quantite =quantite + $qte,date ='$aujourdhui'  WHERE  id = '$id_stock' ;") OR print_r($file_db->errorInfo());



}




$stockSelect = '';
$result_one = $file_db->query("SELECT * FROM stock ");
foreach($result_one as $row) {
$stockSelect.= '<option value="'.$row['id'].'">'.$row['designation'].'</option>';
}



$listeDesAchats = '';
$result_one = $file_db->query("SELECT *,(SELECT designation FROM stock WHERE stock.id= achats.id_stock) AS designation  FROM achats ");
foreach($result_one as $row) {
  extract($row);
  $listeDesAchats.="<tr><td>$id</td><td>$designation</td><td>$prix</td><td>$quantite</td><td>$montant</td><td>$date</td></tr>";
// $listeDesAchats.=' <tr  data-id="'.$row['id'].'"><td>'.$row['id'].'</td><td>'.$row['designation'].+'</td><td>'.$row['prix'].'</td><td>'+liste[i].quantite+'</td><td>'+liste[i].date+'</td></tr>';
}


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css" >
      <link rel="stylesheet" href="css/garderie.css">
      <style media="screen">
        .leftBar {width: 280px}
        .mainBar{ padding-left:280px ;  }
        .thead{background: #29b6f6}
        #res{background: #e1f5fe}

      </style>
    <title></title>
  </head>
  <body>
    <div class="leftBar">
    <div class="inner">

    <input type="text" id="search" oninput="Chercher()" placeholder="Rechercher..." class="form-control " name="" value="">
    <hr>
<h1 align="center" id="count">0</h1>


<hr>
<form class="" action="achats.php" method="post">

<select name="id_stock" class="form-control">
<?php print $stockSelect; ?>
</select>

<br>

<input type="number" id='qte' required  oninput="montant_total()"  class="form-control"  placeholder="Quantité..." name="qte" value="">

<br>

<input type="number" id='prix'  required oninput="montant_total()" class="form-control" name="prix" value=""  placeholder="Prix unitaire...">
<br>

<input type="text" id='montant'   class="form-control"  name="montant" value="" disabled placeholder="montant...">
<br>

<button type="submit"class="form-control btn-primary"  name="button">Ajouter</button>
</form>

    </div>
</div>
<div class="mainBar">

<table class="table table-bordered table-hover" >
<thead class="thead">
  <tr>
    <th>N</th>

    <th>Désignation</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Montant</th>
    <th>Date </th>

  </tr>
</thead>
<tbody id="res" >
<?php
print $listeDesAchats;
 ?>
</tbody>

</table>

</div>
  </body>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">


     function montant_total(){
var qte= $('#qte').val();
var prix = $('#prix').val();
if (prix == '' || qte=='') return;
var mnt = eval(qte+' * '+prix);
$('#montant').val(mnt);
     }

  </script>

</html>
