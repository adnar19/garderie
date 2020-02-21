var ajax = frequency;
function affichertab(tab) {
if (_('.tab2.afficher')) _('.tab2.afficher').classList.remove('afficher');
_('.'+tab).classList.add('afficher');
if (tab == 'ajouter') _('#nom').focus();

}

_('#ajouter').addEventListener('click',function(){
  // e.preventDefault();
  var form= this;

var data = [];
data.push('idp='+_("#idp").value);
data.push('ide='+_("#ide").value);
data.push('nom='+_("#nom").value);
data.push('prenom='+_('#prenom').value);
data.push('datedenaissance='+_('#datedenaissance').value);
data.push('etat='+_('#etat').checked);
data.push('type='+(_('#type').checked)?'1':'0');
data.push('nomP='+_('#nomP').value);
data.push('prenomP='+_('#prenomP').value);
data.push('tel='+_('#tel').value);
data.push('numcd='+_('#numcd').value);
data.push('carte='+_('#carte').value);



ajax.post('post/ajouter.php',data.join('&'),function(rr){
console.log(rr);
_("#idp").value = '0';
_("#ide").value = '0';
_("#nom").value = '';
_("#prenom").value = '';
_("#datedenaissance").value = '';
_("#nomP").value = '';
_("#prenomP").value = '';
_("#tel").value = '';
_("#numcd").value = '';
_("#carte").value = '';
_("#etat").checked = false;
_("#type").checked = false;

presence();
affichertab('list');
})
})

_('#carte').addEventListener('keypress',function(e){
  // if (e.keyCode == 13) AfficherPresence();
var  carte =  _('#carte').value;
if (isNaN(carte)) {
carte = maj(carte);
_('#carte').value = carte;
}

var inf;
for (var i = 0; i < listeDesEnfants.length; i++) {
  console.log(listeDesEnfants[i].parents_inf);
  inf = listeDesEnfants[i].parents_inf.split('::');
if   (inf[3] == carte) {
_('#idp').value =listeDesEnfants[i].id_parents;

_('[id="nomP"]').value =inf[0];
_('[id="prenomP"]').value =inf[1];
_('[id="tel"]').value =inf[2];
_('[id="numcd"]').value =inf[3];
  break;
}
}



})
_('#q').addEventListener('keyup',function(e){
  AfficherPresence();
})

 // window.addEventListener('keypress',function(e){
 //   // e.preventDefault();
 //   console.log(window.activeElement);
 //   _('#q').focus();
 // })

var listeDesEnfants;
ajax.getJSON('json/jsonenfants.php?search=',function(r){
listeDesEnfants = r;
new autoComplete({
    selector: '#nom',
    minChars: 1,
    source: function(term, suggest){
        term = term.toLowerCase();
        var choices = r;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].nom.toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    },
    renderItem: function (item, search){
        search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
        return '<div class="autocomplete-suggestion" d-p="'+item.parents_inf+'" d-id="'+item.id+'" d-nom="'+item.nom+'" d-prenom="'+item.prenom+'" d-date="'+item.datedenaissance+'" d-etat="'+item.etat+'" d-idp="'+item.id_parents+'" >  '+item.nom+'</div>';
    },
    onSelect: function(e, term, item){
      var nom = item.getAttribute('d-nom'),
       prenom = item.getAttribute('d-prenom'),
       id = item.getAttribute('d-id'),
        datedenaissance = item.getAttribute('d-date'),
         etat = item.getAttribute('d-etat'),
         parents = item.getAttribute('d-p').split('::'),
         nomP = parents[0] ,
         prenomP= parents[1],
         tel= parents[2],
         ncarte= parents[3],
         cartes= parents[4],
         type= parents[5],

          idp =item.getAttribute('d-idp');
          _('#idp').value = idp;
          _('#ide').value = id;
_('#etat').checked = (etat == 'true');
          $('#nom').val(nom);
          $('#prenom').val(prenom);
          $('#datedenaissance').val(datedenaissance);
          $('#carte').val(ncarte);
          $('#nomP').val(nomP);
          $('#prenomP').val(prenomP);
          $('#tel').val(tel);
          $('#numcd').val(ncarte);
          if(type == '0') {
            $('#carte').val('');

          } else {
            $('#carte').val(cartes);
          }







    }
});
})
function rechercheParent(r) {
  r = r.toLowerCase();
  var result = '' ,parentinf;
  for (var i = 0; i < listeDesEnfants.length; i++) {
 listeDesEnfants[i].parents_inf = ( listeDesEnfants[i].parents_inf == null ?'::::::::': listeDesEnfants[i].parents_inf);
    parentinf = listeDesEnfants[i].parents_inf.split('::');
  if (listeDesEnfants[i].parents_inf.toLowerCase().indexOf(r) > -1) result += '<span onclick="fillp(\''+listeDesEnfants[i].id_parents+'\',\''+parentinf[0]+'\',\''+parentinf[1]+'\',\''+parentinf[2]+'\',\''+parentinf[3]+'\',\''+parentinf[4]+'\',\''+parentinf[5]+'\')" class="badge badge-warning">'+parentinf[0]+' '+parentinf[1]+'</span><br>';
  }
_('.recherchep').innerHTML = result;
}


fillp = function(idp,pn,pp,pt,pcn,ptype,pcarte){

_('#nomP').value = pn;
_('#prenomP').value = pp;
_('#tel').value = pt;
_('#numcd').value = pcn;
_('#type').checked = (ptype == '1');
if (ptype == '1') _('#carte').value = pcarte;
_('#idp').value = idp;

_('.recherchep').innerHTML = '';
}
var liste,liste2 , listedesprix;
function presence (){
ajax.getJSON('json/jsonpresence.php',function(res){
listedesprix = res.listedesprix;
// liste =  res.liste;
liste2 =  res.liste;
console.log('liste',liste2.length);
AfficherPresence();
})
window.setTimeout(presence,6000);
}
presence();


function prix(t,ta,type){
  t = parseInt(t);
  ta = parseInt(ta);
t -= cmg(ta,t);
type = parseInt(type);
var pr = 0 ;
for (var i = 0; i < listedesprix.length; i++) {

if (t > listedesprix[i].tmps)  pr = listedesprix[i].prix1;
}

return pr;


}


function cmg(T1,Tn){
  T1 = T1%360 ;
  var T2 = T1 + Tn , mg ;
  if (T1 < 300 && T2 <300) {
    mg = 0;
  } else if (T1 < 300) {
mg = T2 - 300;
mg = (mg > 60?60:mg);
  } else {
mg = 360 - T1;
mg = (mg > Tn?Tn: mg);
  }
return mg;
}


function maj(x){
   x = x.replace(/\&/g, "1");
   x = x.replace(/é/g, "2");
   x = x.replace(/\"/g, "3");
   x = x.replace(/'/g, "4");
   x = x.replace(/\(/g, "5");
   x = x.replace(/-/g, "6");
   x = x.replace(/è/g, "7");
   x = x.replace(/_/g, "8");
   x = x.replace(/ç/g, "9");
   x = x.replace(/à/g, "0");
  console.log(x);
  return x;
}

var pdata   , search;
function rechercheParCarte(){ 
  pdata = [];
  if (search == ''){console.log('r1'); return;}

  search =   _('.recherche').value;
  if (isNaN(search)){
     search = maj(search);
     _('.recherche').value = search;
   }
console.log('liste',liste2.length);
  var list = liste2.filter(function(el){
  return (el.parent.split('::')[5]  == search);
  });

  var  enfant,parent,idgt,solde=0, temp,montant,idenfant ,total = 0 ,now = moment();
  console.log(list.length);
  if (list && list.length) {
    for (var i = 0; i < list.length; i++) {
       enfant = list[i].enfant.split('::');
       idenfant = list[i].id_enfant;
       idgt = list[i].id;
  temp =  now.diff(moment(list[i].date_e),'minutes');
  parent = list[i].parent.split('::');
  solde = parseInt(parent[6]);
  montant =prix(temp - solde,list[i].ta,'0');

  if(list[i].enfant_numero == 3) montant /= 2;
  if(list[i].enfant_numero == 4) montant = 0;
  if (enfant[2] == 'true' )   montant /= 2;
  montant = (Math.round(montant/10)) *10;
  total += montant;
  pdata.push(idgt+'-'+montant+'-'+temp+'-'+ list[i].id_parent);
  console.log(list[i].id_parent);
    }
  console.log(pdata.join(':'));
    _('.montant').innerText = total;
    validerTous(pdata.join(':'),function(re){

      console.log(re);
    });
    valider.afficher();
  }
}

  _('.recherche').addEventListener('keypress',function(r){
    if (r.keyCode == 13) {
console.log('enter...');
rechercheParCarte();
console.log('....enter...');


    }

  })

var valider = {
  el : _('#valider') ,
  afficher : function(){
    valider.el.classList.remove('m')
  } ,
  masquer : function(){
    valider.el.classList.add('m')
  }
}


function AfficherPresence() {
  var html = '' ,solde = 0, parent,enfant ,total = 0 ,lst = liste2, now = moment() ,temp , montant,type ,recherche = _('.recherche').value;

if(lst && lst.length) {
  for (var i = 0; i < lst.length; i++) {
    if (lst[i].parent == null) lst[i].parent = '::::::::';
    if (lst[i].enfant == null) lst[i].enfant = '::::::::';
    parent = lst[i].parent.split('::');
 enfant = lst[i].enfant.split('::');
 type=parent[4];
temp =  now.diff(moment(lst[i].date_e),'minutes');
solde = parseInt(parent[6]);
  // temp -= parseInt(parent[6]);
//console.log(parent[6]);
if (lst[i].ta == null) lst[i].ta = 0;
montant =prix(temp - solde,lst[i].ta,type);

if(lst[i].enfant_numero == 3) montant /= 2;
if(lst[i].enfant_numero == 4) montant = 0;
if (enfant[2] == 'true' )   montant /= 2;
montant = (Math.round(montant/10)) *10;

total += parseFloat(montant);
   html +='<tr data-id="'+lst[i].id+'" > <td>'+enfant[0]+'</td><td>'+enfant[1]+'</td><td>'+parent[0]+' '+parent[1]+'</td><td>'+parent[2]+'</td><td>'+parent[3]+'</td><td>'+temp+' '+(solde == 0 ?'':'('+solde+')')+'</td><td>'+montant+'</td><td><a class="btn btn-success btn-sm" onclick="validerr('+parent[5]+')"><i class="fa fa-check"></i></a></td></tr>';
  }
  }
total =  parseFloat(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$& ');
  $('#total').html(total);
if(lst && lst.length)  $('#nombre').html(lst.length);
  $('#resu').html(html);

 // affichertab('list');

}


function validerTous(param,callback){
  console.log('re '+param);
ajax.get('post/validert.php?data='+param, function(c){
callback(c);
// alert(c);
})
}

function validerr(carte){

 _('.recherche').value =carte;
 rechercheParCarte();

  // var idgt = id ,
  // tr = document.querySelector('[data-id="'+id+'"]') ,
  // tmp = tr.children[5].innerText ,
  // prix = tr.children[6].innerText ;
  // ajax.post('post/valider.php','idgt='+idgt+'&temp='+tmp+'&prix='+prix,function(){
  //   presence()
  //
  // })
}



function cadeaux(id,div) {
  console.log(id);
var aqtt = parseInt(_('[data-qt="'+id+'"]').innerText);



if (aqtt<1) {
  reurn;
}

  ajax.post('post/cadeaux.php','id='+id,function(){
aqtt--;
if (aqtt<20) {
div.classList.add('bg-danger');
}
_('[data-qt="'+id+'"]').innerText = aqtt;
  })

}
