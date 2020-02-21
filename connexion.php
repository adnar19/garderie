<?php

require 'config.php';
$uss = '';
$result_one = $file_db->query("SELECT * FROM users");
foreach($result_one as $row) {
$uss.= '<option value="'.$row['id'].'" d-role="'.$row['role'].'" d-pass="'.$row['pwd'].'">'.$row['nom'].'</option>';
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/garderie.css">


  </head>
  <body>




       <div class="container-fluid bg">



          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
               <div class="col-md-4 col-sm-4 col-xs-12" >

                   <form class="form-container bg-info" id="loginform">
                     <div class="form-group">
                       <label for="username">Utilisateur</label>
                       <!-- <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Nom d'utilisateur"> -->
                       <select class="form-control" id="username"  name="">

                         <?php print $uss; ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="password">Mot de passe</label>
                       <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                     </div>


                     <button type="submit"   class="btn btn-light btn-block">Connexion</button>

                   </form>

               </div>
            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>
          </div>






        </div>



  </body>
  <script type="text/javascript" src="js/md5.min.js">  </script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js">  </script>
    <script href="js/bootstrap.min.js"></script>
    <!-- <script src="js/login.js" charset="utf-8"></script> -->
    <script type="text/javascript">

    document.getElementById('loginform').addEventListener('submit',function(e){
      e.preventDefault();
      login();
      return false;
    })
function login(){
  var sel = document.getElementById('username') ,
  uid = sel.value ,
  role = sel.options[sel.options.selectedIndex].getAttribute('d-role') ,
  password1 =  sel.options[sel.options.selectedIndex].getAttribute('d-pass') ,
  password2 =  document.getElementById('password').value ;

  if( password1 == md5(password2)) {
    $.ajax({
      type:'POST',
      url:'setcookie.php',
      data :{uid:uid , role:role } ,
      success :function(c){
        // alert(c);return;
     window.location.href = 'dashboard.php';
      }
    })
  } else {
document.getElementById('password').value ='';
alert('mot de passe incorrect !');
  }

}
    </script>
</html>
