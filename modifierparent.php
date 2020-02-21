<?php
include 'cookies.php';

if ($role != '0') include 'ai.php';
$pid = $_REQUEST['id'];

$nom = '';
$prenom = '';
$tel = '';
$ncarte = '';
$type ='';
$cartes = '';


include 'config.php';


if (isset($_POST['action'])) {
if ($_POST['action'] == 'edit') {
extract($_POST);

 $file_db->exec("UPDATE  parents SET nom='$nom' , prenom= '$prenom' ,tel= '$tel', ncarte= '$ncarte' , cartes= '$cartes' , type= '$type' WHERE id='$pid'");

}



}


if ($pid !=='0') {
$result_one = $file_db->query("SELECT * FROM parents WHERE id='$pid'");
foreach($result_one as $row) {
		$nom = $row['nom'];
		$prenom =$row['prenom'];
		$tel = $row['tel'];
		$ncarte = $row['ncarte'];
		$cartes = $row['cartes'];
		$type = $row['type'];
}
}









 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<br>
			<form id="addForm" method="POST" action="modifierparent.php">


			<div class="card">
				<div class="card-header  bg-primary text-white">Modifier Parent</div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="id" value="<?php print $pid; ?>">
<input type="hidden" name="action" value="edit">

						<div class="form-group">
							<label for="nom" class="control-label">Nom</label>
							<input type="text" name="nom" id="nom" class="form-control " value="<?php print $nom; ?>" required />
						</div>

						<div class="form-group">
							<label for="prenom" class="control-label">Prenom</label>
							<input type="text" name="prenom" id="prenom" value="<?php print $prenom; ?>"
							class="form-control"/>
						</div>



							<div class="form-group">
								<label for="tel" class="control-label">Telephone </label>
								<input type="number" name="tel" id="tel" value="<?php print $tel; ?>"
								class="form-control"/>
						</div>

            <div class="form-group">
              <label for="ncarte" class="control-label">Carte d'identité </label>
              <input type="number" name="ncarte" id="ncarte" value="<?php print $ncarte; ?>"
              class="form-control"/>
            </div>

            <div class="form-group">
              <label for="cartes" class="control-label">Carte </label>
              <input type="number" name="cartes" id="cartes" value="<?php print $cartes; ?>"
              class="form-control"/>
            </div>

            <div class="form-group ">
                <label for="type">Type</label>
                <select id="type" name="type" class="form-control">
                  <option value="0" selected>Normal</option>
                  <option value="1">Silver</option>
                  <option value="2">Gold</option>
                </select>
              </div>

						<button type="submit" class="btn btn-primary">Enregistrer</button>


					</form>
				</div>
			</div>





 		</div>
	</body>


<script type="text/javascript">
<?php
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
	?>
	window.onload = function(){

 window.opener.Chercher();
 window.close();
}
<?php
}
 ?>

</script>




</html>
