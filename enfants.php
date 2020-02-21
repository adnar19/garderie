
<?php
include 'cookies.php';

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
      tr.active {background: #4db6ac !important ;}
      .thead{background: #ffd740}
      #res{background: #ffecb3}
      tr.editmode td{background: #fff;}
      tr td .btn-warning {opacity:0}
      tr:hover td .btn-warning {opacity:1}
      tr td .btn-danger {opacity:0}
      tr:hover td .btn-danger {opacity:1}

      tr td .btn-primary {opacity:0}
      tr.editmode td .btn-primary {opacity:1}
    </style>
  </head>
  <body>


    <div class="leftBar">
    <div class="inner">
    <input type="text" id="search" oninput="Chercher()" placeholder="recherche..." class="form-control " name="" value="">
    <hr>
<h1 align="center" id="count">0</h1>
<hr>


    </div>
</div>
<div class="mainBar">

<table class="table table-bordered table-hover" >
<thead class="thead">
  <tr>
    <th>NOM</th>
    <th>PRENOM</th>
    <th>Date de naissance</th>
    <th>Etat</th>
    <th>Action</th>
  </tr>
</thead>
<tbody id="res" >

</tbody>

</table>

</div>
</body>

<script src="js/frequency.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/enfants.js"></script>
</html>
