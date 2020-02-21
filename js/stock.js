
var liste =[];


function Chercher() {
  var search = $('#search').val();
  $.ajax({
    dataType: "json",
    url: 'json/jsonstock.php?search='+search,
    success: function(resultats){

      liste=resultats;
      AfficherResultats();


    }
  });
}

function AfficherResultats() {
  var html = '', nombre=0;
  for (var i = 0; i < liste.length; i++) {
  

   html +='<tr><td>'+liste[i].id+'</td><td>'+liste[i].designation+'</td><td>'+liste[i].prix+'</td><td>'+liste[i].quantite+'</td><td>'+liste[i].date+'</td></tr>';


   nombre++;
  }

  $('#res').html(html);
  $('#count').html(nombre);
}




Chercher();



function setTr(el) {
  $('tr.active').removeClass('active');
el.classList.add('active')
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
  url: 'post/supprimerstock.php',
  data: {id:idActive},
  success: function(reponse){
 //alert(reponse);
 console.log(reponse);
 Chercher();
  }
});

  }
}
