<!DOCTYPE html>


<?php

include 'cookies.php';
include "inc/navbar.php";
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css" >
      <link rel="stylesheet" href="css/garderie.css">
      <style media="screen">
        #res{background: #eceff1;}
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
<button class="btn btn-block btn-warning btn-sm" type="button" name="Modifier" onclick="EditActive()"><i class="fa fa-edit"></i></button>
<button class="btn btn-block btn-danger btn-sm" type="button" name="Supprimer" onclick="supprimer()"><i class="fa fa-trash"></i></button>

    </div>
</div>
<div class="mainBar">

<table class="table table-bordered table-hover" >
<thead class="thead-dark">
  <tr>
    <th>N</th>
    <th>Désignation</th>
    <th>Prix unitaire</th>
    <th>Quantité disponible</th>
    <th>Date de stockage</th>

  </tr>
</thead>
<tbody id="res" >

</tbody>

</table>

</div>
  </body>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/stock.js"></script>
</html>
