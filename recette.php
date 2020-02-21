<?php
include 'cookies.php';
if ($role != '0') include 'ai.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/font-awesome.min.css" >
    <link rel="stylesheet" href="css/garderie.css">

		<style media="screen">
.table tr.active td {background: #b2ebf2 !important }

.mainBar{padding-left:240px}
		</style>

    <title> Recette </title>
  </head>
  <body>

<?php

include 'inc/navbar.php';
 ?>



<div class="sidebar" >
<h1 align="center" id="total">0</h1>
<hr>
<h4 align="center" id="total1"></h4>
<hr>
<h4 align="center" id="total2"></h4>
<hr>
<input type="date" name="d1" id='d1' class="form-control form-control-sm" value="<?php print date('Y-m-d');?>" onchange="Recette()"><br>
<input type="date" name="d2" id='d2'  class="form-control form-control-sm" value="<?php print date('Y-m-d');?>" onchange="Recette()">
<hr>




<button type="button" class="btn btn-secondary btn-block" onclick="changedate(0)" name="button">Aujourd'hui</button>
<button type="button" class="btn btn-secondary btn-block" onclick="changedate(1)" name="button">Hier</button>
<button type="button" class="btn btn-secondary btn-block" onclick="changedate(2)" name="button">Cette semaine</button>
<button type="button" class="btn btn-secondary btn-block" onclick="changedate(3)" name="button">Ce moi</button>
<button type="button" class="btn btn-secondary btn-block" onclick="changedate(4)" name="button">Cette annee</button>



</div>

<div class="container- mainBar" >

<div class="row">
<div class="col-12">
<div class="card" id="date">

</div>
</div>


<div class="col-7">
  <table class="table table-bordered table-hover" style="background-color:#00bfa5">
  <thead>
    <tr>
      <th>parent</th>
      <th>Montant</th>
      <th>Date</th>
      <th>temps</th>
    </tr>
  </thead>
  <tbody id="resultat"  style="background-color:#a7ffeb">
  </tbody>
  </table>
</div>
<div class="col-5">

  <table class="table table-bordered table-hover" style="background-color:#757575">
  <thead>
    <tr>
      <th>parent</th>
      <th>Montant</th>
      <th>Date</th>
      <th>temps</th>
    </tr>
  </thead>
  <tbody id="result"  style="background-color:#BDBDBD">
  </tbody>
  </table>



</div>

</div>




</div>








  </body>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/recette.js"></script>

</html>
