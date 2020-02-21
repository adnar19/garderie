<?php
include "cookies.php";
include "inc/navbar.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/garderie.css">

    <title></title>
    <style media="screen">
      tr.active {background: #4db6ac!important;}
      .thead{background: #26a69a ;}
      #res{background: #e0f2f1 ;}
    </style>
  </head>
  <body>


    <div class="leftBar">
    <div class="inner">
    <input type="text" id="search" oninput="Chercher()" placeholder="recherche..." class="form-control " name="" value="">
    <hr>
<h1 align="center" id="count">0</h1>
<hr>
<!-- <button class="btn btn-block btn-primary " type="button" onclick="recharger()"><i class="fa fa-refresh"></i></button> -->
<button class="btn btn-block btn-warning " type="button" name="Modifier" onclick="EditActive()"><i class="fa fa-edit"></i></button>
<button class="btn btn-block btn-danger " type="button" name="Supprimer" onclick="supprimer()"><i class="fa fa-trash"></i></button>

    </div>
</div>
<div class="mainBar">

<table class="table table-bordered table-hover" >
<thead class="thead ">
  <tr>

    <th>Nom</th>
    <th>Prenom</th>
    <th>Téléphone</th>
    <th>Carte d'identité</th>
    <th>Numéro de carte</th>
    <th>Solde</th>
  </tr>
</thead>
<tbody id="res" >

</tbody>

</table>

</div>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/parents.js"></script>
</html>
