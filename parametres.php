<?php
include 'cookies.php';
include "inc/navbar.php";
if ($role !='0') include 'ai.php';

include 'config.php';
if (isset($_POST['button'])) {
$nom = $_POST['nom'];
$pwd1 =md5($_POST['pwd1']);
$pwd2= md5($_POST['pwd2']);
$role =$_POST['role'];

if ($pwd1==$pwd2) {

  $file_db->exec("INSERT INTO users (nom,pwd,role) VALUES ('$nom','$pwd1','$role') ;") OR print_r($file_db->errorInfo());
}
else {
  return;
}

}

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
.row{margin: 50px auto;width: 600px;}

.leftBar ul  li{font-size: 15px;}
.reset{width:35vw;margin: 40px auto}
.utilisateurs{width:50vw;margin: 40px auto}
.ajouter{width:40vw;margin: 40px auto}
.changer{width:50vw;margin: 40px auto}
    </style>
  </head>
  <body>



    <div class="leftBar "style="">


    <ul>


        <li onclick="affichertab('reset');"><span><i class="fa fa-database"></i></span> Reset</li>


        <li onclick="affichertab('tarifs');"><span><i class="fa fa-money"></i></span> Gestion des tarifs</li>


        <li onclick="affichertab('utilisateurs');"><span><i class="fa fa-users"></i></span> Utilisateurs</li>


        <li onclick="affichertab('ajouter');"><span><i class="fa fa-user-plus"></i></span> Ajouter Utilisateurs</li>

        <li onclick="affichertab('changer');"><span><i class="fa fa-edit"></i></span> changer de mot de passe</li>

    </ul>

    </div>



    <div class="mainBar  ">





     <div class="reset afficher tab2">

       <div class="card "  >
         <div class="card-header">
           Réinitialisation
         </div>

<div class="card-body">


      <div class="form-group  " >

<div class="form-check check">
  <input class="form-check-input" type="checkbox" name="ra" id="defaultCheck" >
  <label class="form-check-label" for="defaultCheck">
Réinitialiser les achats
  </label>
</div>
<div class="form-check check">
  <input class="form-check-input" type="checkbox" name="re" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
Réinitialiser les enfants
  </label>
</div>
<div class="form-check check">
  <input class="form-check-input" type="checkbox" name="rs" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
Réinitialiser  le stock
  </label>
</div>
<br>
<div class="form-group  check">
  <input type="password" class="form-control" id="password" name="pwd" placeholder="Vous devez introduire le mot de passe ici" required>
  <br>
   <button type="submit" onclick="reinitialiser()" class="btn btn-success btn-block">Valider</button>
 </div>
</div>
</div>
</div>
     </div>






          <div class="tarifs tab2">
            <table class="table table-bordered table-striped" >
            <thead class="thead bg-success text-white">
              <th>Durée</th>
              <th>Tarif</th>
            </thead>
            <tbody id='tarifs'>

            </tbody>
          </table>


          </div>








      <div class="utilisateurs tab2">
        <table class="table table-bordered table-hover" >
        <thead class="thead bg-primary text-white">
          <tr>

            <th>Nom d'utilisateur</th>
            <th>Role</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody id="resultat" >

        </tbody>

        </table>

      </div>



      <div class="ajouter tab2">
    <form class="adduForm" method="post" action="parametres.php">
          <div class="card ">
<div class="card-header">
  Ajouter Utilisateur
</div>
<div class="card-body">

              <div class="form-group  " >
                <label for="password">Nom utilisateur</label>
                <input type="text" class="form-control"  name="pseudo" placeholder="pseudo" required>
                <br>
                  <label for="password">Veuillez choisir le role</label>
                <select class="custom-select" name="role">
                <option value="1">Super admin</option>
                <option value="2">Admin</option>
                <option value="3" selected>User</option>
              </select>
                <br>
                <br>
                <label for="password">Mot de passe</label>
                  <input type="password" class="form-control" name="pwd1"  placeholder="mot de passe" required>
                  <br>  <label for="password">Confirmer mot de passe</label>
                    <input type="password" class="form-control"  name="pwd2"  placeholder="mot de passe" required>
                    <br>


                 <button type="submit" onclick="ajouterUtilisateur()" class="btn btn-danger btn-block" name="button">Confirmer</button>
              </div>
            </div>

            </div>
</form>

      </div>




      <div class="changer tab2">
    <form name= "passform"  class="changePassword" method="post"  >
          <div class="card ">
<div class="card-header">
  changer de mot passe
</div>
<div class="card-body">

              <div class="form-group  " >
                <label for="password"> Ancien Mot de passe</label>
                  <input type="password" class="form-control" name="oldpass"   placeholder="mot de passe" required>
                  <br>  <label for="password">Nouveau  mot de passe</label>
                    <input type="password" class="form-control"  name="newpass1"  placeholder="mot de passe" required>
                    <br>
                    <label for="password"> Confirmer le Nouveau  mot de passe</label>
                    <input type="password" class="form-control"  name="newpass2"  placeholder="mot de passe" required>
                    <br>


                 <button type="sub"  class="btn btn-info btn-block" name="button">Confirmer</button>
              </div>
            </div>

            </div>
</form>

      </div>

    </div>





    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">

    <!-- Then put toasts within -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <!-- <img src="..." class="rounded mr-2" alt="..."> -->
        <strong class="mr-auto">Réinitialisation</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body" id="modalmessage">

      </div>
    </div>
  </div>



  </div>


  </body>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/frequency.js" charset="utf-8"></script>
    <script type="text/javascript">

    function affichertab(tab) {
    if (_('.tab2.afficher')) _('.tab2.afficher').classList.remove('afficher');
    _('.'+tab).classList.add('afficher');

    }
    var alerte = $('.modal');
    var liste =[];


    function tarif() {
      var html = '';
      $.ajax({
        dataType: "json",
        url: 'json/jsontarifs.php',
        success: function(resultats){
          liste=resultats;

          for (var i = 0; i < liste.length; i++) {
            html +='<tr><td contentEditable="true" onblur="sauvegarderPrix(\'tmps\','+liste[i].id+',this.innerText)" >'+liste[i].tmps+'</td><td contentEditable="true" onblur="sauvegarderPrix(\'prix1\','+liste[i].id+',this.innerText)">'+liste[i].prix1+'</td></tr>';

          }
$('#tarifs').html(html);
        }
      });
    }


function sauvegarderPrix(td,id,value){
value = parseFloat(value);
if (isNaN(value)) return;

frequency.post('post/param_prix.php','key='+td+'&value='+value+'&id='+id , function(){});

}




    function supprimertarif(id) {

      var idActive =id;
      if (idActive == undefined) return;

      var r = confirm("Voulez vous supprimer ?");
      if (r) {
    // delete
    $.ajax({
      type: "POST",
      url: 'post/supprimertarif.php',
      data: {id:idActive},
      success: function(reponse){
     //alert(reponse);
     console.log(reponse);

     tarif();
      }
    });

      }
    }

tarif();






function utilisateurs(){
  $.ajax({
    dataType: "json",
    url: 'json/jsonusers.php',
    success: function(resultats){
var uhtml = '';
for (var i = 0; i < resultats.length; i++) {
//   if(resultats[i].id=='1'){
//     uhtml+='<tr><td>'+  resultats[i].nom +' </td><td>'+  resultats[i].role+ ' </td><td></td></tr>';}
// else{
// }
  uhtml+='<tr><td>'+  resultats[i].nom +' </td><td>'+  resultats[i].role+ ' </td><td>';
if (resultats[i].id != '1')  uhtml +='<button class="btn btn-danger" onclick="supprimeruser('+resultats[i].id+')"><span><i class="fa fa-trash"></i></span></button>';
  uhtml +='</td></tr>';
}

$('#resultat').html(uhtml);

    }
  });
}


function supprimeruser(id) {

  var idActive =id;
  if (idActive == undefined) return;

  var r = confirm("Voulez vous supprimer ?");
  if (r) {
// delete
$.ajax({
  type: "POST",
  url: 'post/supprimeruser.php',
  data: {id:idActive},
  success: function(reponse){
 //alert(reponse);
 console.log(reponse);

 utilisateurs();
  }
});

  }
}


utilisateurs();


function reinitialiser() {
  var dr = {
  re : (document.querySelector('[name="re"]').checked ? '1':'0') ,
  ra : (document.querySelector('[name="ra"]').checked ? '1':'0') ,
  rs : (document.querySelector('[name="rs"]').checked ? '1':'0') ,

  pwd :  document.querySelector('[name="pwd"]').value ,
  };
   $.ajax({
     type: "POST",
     url: 'post/reinitialiser.php',
     data: dr,
     success: function(reponse){
       console.log(reponse);
       $('#modalmessage').html(reponse);

       //$('.toast').toast(show);
       alert(reponse);

              $('#password').val('');
     }
   });

}


_('.changePassword').addEventListener('submit',function(e){
  e.preventDefault();
  changeMotDePasse();
})

function changeMotDePasse(){
var oldpass = _('[name="oldpass"]').value ,
 newpass1 = _('[name="newpass1"]').value ,
 newpass2 = _('[name="newpass2"]').value ;
if (oldpass == '' || newpass1 =='') {
  alert  ('mot de passe vide ')
return;
}
 if (newpass1 !== newpass2) {
alert('mots de passe non identiques !');
   return;
 }
if (newpass1.length<4) {
  alert("mot de passe trop court");
 return;
}

 $.ajax({
   type: "POST",
   url: 'modifiermotdepasse.php',
   data: {oldpass:oldpass, newpass1:newpass1},
   success: function(reponse){
  //alert(reponse);
alert(reponse);

   }
 });

}

    </script>

</html>
