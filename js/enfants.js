
var liste =[];


function Chercher() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsonenfants.php?search='+search,
    success: function(resultats){

      liste=resultats;
      AfficherResultats();



    }
  });
}

function sauvegarder_e(td,id,value){

frequency.post('post/modifier_enf.php','key='+td+'&value='+value+'&id='+id , function(y){console.log(y);});}



function AfficherResultats() {

  var html = '', nombre=0;
  for (var i = 0; i < liste.length; i++) {
    html +='<tr data-id="'+liste[i].id+'" ><td  >'+liste[i].nom+'</td><td >'+liste[i].prenom+'</td><td  >'+liste[i].datedenaissance+'</td><td ><input type="checkbox"  '+(liste[i].etat == 'true'?'checked':'')+' disabled></td><td><button class="btn btn-danger " type="button" onclick="supprimer('+liste[i].id+')"><i class="fa fa-trash"></i></button>  <button class="btn btn-warning " type="button" onclick="modifier(this)"><i class="fa fa-edit"></i></button>  <button class="btn btn-primary  " type="button" onclick="save(this)"><i class="fa fa-check"></i></button></td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}
function modifier(btn) {
  var td= btn.parentNode , tr = td.parentNode , tid = tr.getAttribute('data-id');
  tr.classList.add('editmode');
  tr.children[0].setAttribute('contentEditable','true');
  tr.children[0].setAttribute('onkeydown','sauvegarder_e(\'nom\','+tid+',this.innerText)');

  tr.children[1].setAttribute('contentEditable','true');
  tr.children[1].setAttribute('onkeydown','sauvegarder_e(\'prenom\','+tid+',this.innerText)');

  tr.children[2].setAttribute('contentEditable','true');
  tr.children[2].setAttribute('onkeydown','sauvegarder_e(\'datedenaissance\','+tid+',this.innerText)');

  tr.children[3].setAttribute('contentEditable','true');
    tr.children[3].children[0].removeAttribute('disabled');
  tr.children[3].children[0].setAttribute('onchange','sauvegarder_e(\'etat\','+tid+',this.checked)');

  console.log(tr);
}

function save(btn) {
  var td= btn.parentNode , tr = td.parentNode , tid = tr.getAttribute('data-id');
  tr.classList.remove('editmode');
  tr.children[0].removeAttribute('contentEditable');
  tr.children[0].removeAttribute('onkeydown');

  tr.children[1].removeAttribute('contentEditable','true');
  tr.children[1].removeAttribute('onkeydown');

  tr.children[2].removeAttribute('contentEditable');
  tr.children[2].removeAttribute('onkeydown');

  tr.children[3].removeAttribute('contentEditable');

    tr.children[3].children[0].setAttribute('disabled','true');
  tr.children[3].children[0].removeAttribute('onchange');

  console.log(tr);
}


Chercher();



function supprimer(id) {


    var idActive =id;
    if (idActive == undefined) return;

    var r = confirm("Voulez vous supprimer ?");
    if (r) {
  // delete
  $.ajax({
    type: "POST",
    url: 'post/supprimerenfant.php',
    data: {id:idActive},
    success: function(reponse){
   //alert(reponse);
   console.log(reponse);
Chercher();
    }
  });

    }
}
