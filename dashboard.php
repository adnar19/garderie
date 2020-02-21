
<!DOCTYPe html>
<?php
include 'cookies.php';

include "inc/navbar.php";
include "config.php";
$stock = array();
$result_one = $file_db->query("SELECT * FROM stock ");
foreach($result_one as $row) {
 $stock[]  = $row;
}

 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/garderie.css" media="screen">
    <link rel="stylesheet" href="css/auto-complete.css" media="screen">
<style media="screen">
/* .card-header{background: #81d4fa;}
  .card-body{background: #e0f7fa;}
    .card-footer{background: #81d4fa;} */
    .card {margin-bottom:10px}
    tr.active {background: #4db6ac !important ;}
    .thead{background: #e57373}
    #resu{background: #ffcdd2}
    table.form{
      width:100%
    }
</style>


  </head>
  <body>


<div class="leftBar "style="">
<div class="inner">

<!-- <input type="text" class="form-control form-control-sm " name="" > -->

<div class="input-group mb-3">
  <input type="text" class="form-control recherche"  id="q"  placeholder="Carte" aria-label="Rechercher"  aria-describedby="basic-addon1">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
  </div>
</div>
</div>


<ul>
  <!-- <li onclick="affichertab('ajouter');"><span></i> <img src="images/add.png" alt="" style=" width:130px ; height:130px;"></span></li> -->
  <li onclick="affichertab('ajouter');"><i class="fa fa-plus" ></i></li>


  <li onclick="affichertab('list');"><i class="fa fa-list" ></i></li>
  <li id="nombre"> 0</li>
  <li id="total"> </li>
  <!-- <li onclick="affichertab('list');"><span>  <img src="images/liste.png" alt="" style=" width:160px ; height:160px;">
</span></li> -->

</ul>

</div>


<div class="mainBar">

<div class="ajouter   tab2" style="width:700px;margin:0 auto">


 <div class="card">
<div class="card-header">

<h3>AJOUTER</h3>
</div>
<div class="card-body">
<input type="hidden" name="" id="idp" value="0" >
<input type="hidden" name="" id="ide" value="0" >

<table class="form">

<tr>
  <td>Nom</td>
  <td><input type="text" class="form-control" id="nom" required></td>
  <td></td>
</tr>
<tr>
  <td>Prenom</td>
  <td>  <input type="text" class="form-control" id="prenom" required></td>
  <td></td>
</tr>
<tr>
  <td>date de naissance</td>
  <td>  <input type="date" class="form-control" id="datedenaissance" ></td>
  <td></td>
</tr>
<tr>
  <td>etat</td>
  <td><div class="custom-control custom-switch">
  <input type="checkbox" class="custom-control-input" id="etat" >
  <label class="custom-control-label" for="etat"></label>
</div></td>
<td></td>
</tr>

<tr>
</table>
<hr>

<table class="form">
  <tr>
    <td>carte</td>
    <td>  <input type="text"   class="form-control" id="carte" rows="2"></input></td>
    <td rowspan="6" width="35%">
<div class="recherchep">

</div>


    </td>

  </tr>
  <tr>
  <td>Nom du parent</td>
  <td> <input type="text" class="form-control" oninput="rechercheParent(this.value)"  id="nomP" required></td>
</tr>
<tr>
  <td>Prenom du parent</td>
  <td> <input type="text" class="form-control" id="prenomP" required></td>
</tr>
<tr>
  <td>telephone</td>
  <td><input type="text" class="form-control" id="tel" required></td>
</tr>
<tr>
  <td>carte d'identité</td>
  <td> <input type="text" class="form-control" id="numcd" required>
</td>
</tr>
<tr>

  <td>Client fidele</td>
  <td><div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="type" >
    <label class="custom-control-label" for="type"></label>
  </div></td>
</tr>
</table>



















  </div>
  <div class="card-footer">

    <button type="submit" id="ajouter" class="btn btn-success float-right">confirmer</button>
  </div>
  </div>




</div>
<div class="list afficher tab2">




  <table class="table table-bordered table-hover" >
  <thead class="thead">
    <tr>

      <th>NOM</th>
      <th>PRENOM</th>
      <th>Parent</th>
      <th>Tel</th>
      <th>Carte</th>
      <th>Temps</th>
      <th>Prix</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody id="resu" >

  </tbody>

  </table>




</div>

</div>

<div id="valider" class="m" >




<div class="container" style="padding-top:40px">
<div class="row">
<div class="col col-8 row">

<?php for ($i=0; $i <count($stock) ; $i++) {
$class = ($stock[$i]['quantite'] <20 ?'bg-danger':'');
  ?>

<div class="col-6 ">
  <div  id='card' class="card  <?php print $class; ?>" onclick="cadeaux('<?php print $stock[$i]['id']; ?>', this)">
    <div   class="card-body ">
      <h1   class="card-qt "><?php print $stock[$i]['designation']; ?></h1>
<h4 data-qt='<?php print $stock[$i]['id']; ?>'><?php print $stock[$i]['quantite']; ?></h4>
    </div>
  </div>
</div>

<?php  } ?>





</div>
<div class="col col-4">
<div class="montant">
0.00
</div>
<button type="button" onclick="valider.masquer()"  class="btn btn-success btn-block btn-lg"   name="button">fermer</button>
</div>


</div>
</div>
</div>



  </body>
 
  <script src="js/frequency.js" charset="utf-8"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/enfants.js" charset="utf-8"></script>
  <script src="js/auto-complete.min.js" charset="utf-8"></script>
  <script src="js/dashboard.js" charset="utf-8"></script>

</html>
