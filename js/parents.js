
var liste =[];


function Chercher() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsonparents.php?search='+search,
    success: function(resultats){

      liste=resultats;
      AfficherResultats();



    }
  });
}

function setTr(el) {
  $('tr.active').removeClass('active');
el.classList.add('active')
}

function AfficherResultats() {

  var html = '', nombre=0;
  for (var i = 0; i < liste.length; i++) {

    html +='<tr data-id="'+liste[i].id+'" onclick="setTr(this)" ondblclick="Editer('+liste[i].id+')"><td>'+liste[i].nom+'</td><td>'+liste[i].prenom+'</td><td>'+liste[i].tel+'</td><td>'+liste[i].ncarte+'</td><td>'+liste[i].cartes+'</td><td>'+liste[i].solde+'</td></tr>';
   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}




Chercher();


function Editer(id) {
  window.open('modifierparent.php?id='+id, '', 'width=450px,height=700px');
}

function recharge(id) {
  window.open('recharge.php?id='+id, '', 'width=450px,height=300px');
}

function EditActive(){
  var trActive = $('tr.active') ,
idActive = trActive.attr('data-id');
if (idActive == undefined) return;
Editer(idActive);
}
function recharger(){
  var trActive = $('tr.active') ,
idActive = trActive.attr('data-id');
if (idActive == undefined) return;
recharge(idActive);
}

function supprimer() {

  var trActive =$('tr.active'),
  idActive = trActive.attr('data-id');
  if (idActive == undefined) return;

  var r = confirm("Voulez vous supprimer ?");
  if (r) {
// delete
$.ajax({
  type: "POST",
  url: 'post/supprimerparent.php',
  data: {id:idActive},
  success: function(reponse){
 //alert(reponse);
 console.log(reponse);
 Chercher();
  }
});

  }
}
