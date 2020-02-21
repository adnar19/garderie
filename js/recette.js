var solde = [] , solde=[];
function Recette() {
var d1 =  $('#d1').val();
var d2 =  $('#d2').val();

var dateRange =  moment(d1).format('dddd   DD MMMM YYYY');
if (d1 !== d2) dateRange +=' jusq\'a  '+ moment(d2).format('dddd   DD MMMM YYYY');
  $.ajax({
    dataType: "json",
    url: 'json/jsonrecette.php?d1='+d1+'&d2='+d2,
    success: function(resultats){
      console.log(resultats);
      $('#date').html('<h3 align="center">'+dateRange+'</h3>')
 data = resultats.gt;
 solde = resultats.solde;
 afficher();
    }
  });


}

moment.locale('fr');

var   dates = [
{de: moment().format('YYYY-MM-DD') , j:moment().format('YYYY-MM-DD') } ,
{de: moment().subtract(1,'days').format('YYYY-MM-DD') , j:moment().subtract(1,'days').format('YYYY-MM-DD') } ,
{de: moment().subtract(6,'days').format('YYYY-MM-DD') , j:moment().format('YYYY-MM-DD') } ,
{de: moment().startOf('month').format('YYYY-MM-DD') , j:moment().format('YYYY-MM-DD') } ,
{de: moment().startOf('year').format('YYYY-MM-DD') , j:moment().format('YYYY-MM-DD') } ,
]
function changedate(index) {
  $('#d1').val(dates[index].de);
    $('#d2').val(dates[index].j);
    Recette();
}
function afficher() {
var total = total2 =  0 , res = '' ,recharge='';

if (data && data.length) {
for (var i = 0; i < data.length;i++) {
    res +='<tr><td>'+data[i].parent+'</td><td>'+data[i].prix+'</td><td>'+data[i].date_s+'</td><td>'+data[i].temp+'</td></tr>';
    total +=  parseInt(data[i].prix);

}
}
if (solde && solde.length) {
for (var i = 0; i < solde.length;i++) {

    recharge +='<tr><td>'+solde[i].parent+'</td><td>'+solde[i].montant+'</td><td>'+solde[i].date+'</td><td>'+solde[i].minutes+'</td></tr>';
    total2 +=  parseInt(solde[i].montant);


}
}



$('#total').html(total + total2);
$('#total1').html(total );
$('#total2').html(total2 );
$('#resultat').html(res);
$('#result').html(recharge);

}
Recette();
