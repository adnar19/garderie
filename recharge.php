<?php

include 'cookies.php';
$pid = $_REQUEST['id'];

$nom = '';
$prenom = '';
$tel = '';
$ncarte = '';
$type ='';
$cartes = '';
$aujourdhui=date('Y-m-d H:i:s');

include 'config.php';


if (isset($_POST['action'])) {
if ($_POST['action'] == 'recharger') {
extract($_POST);
list($montant,$minutes) = explode('-',$type);
 $file_db->exec("UPDATE  parents SET solde =(solde)+($minutes),type='1' WHERE id='$pid'");
 $file_db->exec("INSERT INTO solde (idp,date, montant,minutes) VALUES ('$pid','$aujourdhui','$montant','$minutes') ;") OR print_r($file_db->errorInfo());

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
			<form id="addForm" method="POST" action="recharge.php">


			<div class="card">
				<div class="card-header  bg-primary text-white"><?php print $nom . ' '.$prenom; ?></div>
				<div class="card-body">


						<div class="form-group">
<input type="hidden" name="id" value="<?php print $pid; ?>">
<input type="hidden" name="action" value="recharger">

						<div class="form-group">
<select class="form-control" name="type">
<option value="1000-300">1000da (3 H)</option>
<option value="1000-300">2000da (7 H)</option>
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
if (isset($_POST['action']) && $_POST['action'] == 'recharger') {
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
