var display = false;

function showKerkimIAvancuar(){
  var content = '<input type="radio" id="sipasTitullit" name="menyra">';
  content +='<label for="sipasTitullit">Sipas titullit</label><br>';
  content +='<input type="radio" id="sipasAutorit" name="menyra">';
  content +='<label for="sipasAutorit">Sipas autorit</label><br>';
  content +='<label for="zhaneri">Sipas zhanerit</label><br>';
  content +='<select id="zhaneri" name="zhaneri">';
  content +='<option value="none">None</option>';
  content +='<option value="autobiografi">Autobiografi</option>';
  content +='<option value="biografi">Biografi</option>';
  content +='<option value="roman">Roman</option>';
  content +='<option value="poezi">Poezi</option>';
  content +='<option value="novele">Novele</option>';
  content +='<option value="perFemije">Per femije</option>';
  content +='<option value="historik">Historik</option>';
  content +='<option value="fjalor">Fjalor</option>';
  content +='<option value="enciklopedi">Enciklopedi</option>';
  content +='<option value="tjeter">Tjeter</option>';
  content +='</select>';

  $(".kerkimIAvancuarDiv").html(content);
  if(display === false){
    display = true;
  }else {
    display = false;
  }
  $(".kerkimIAvancuarDiv").toggle(display);
}

//funksion qe kerkon librat sa here qe shkruajme ne text box
function kerkoSearchBox() {

  var perdorues_id = $("#info").data('perdorues_id');

  //mer zhanerin ne qofte se eshte i pranishe(kur shtypet butoni 'kerkim i avancuar')
  var zh = $("#zhaneri")[0];
  if(zh){
    var length = zh.options.length;
    var option;
    var zhaneri;
    for(var i = 0; i < length; i++){
      option = zh.options[i];
      if(option.selected === true){
        zhaneri = option.value;
        break;
      }
    }
  }


  //ne qofte se text box-i eshte bosh atehere hiqen te gjitha rezultat (te cilat mund te jene shfaqur me pare) nga divi
  if($("#searchBox").val() == ""){
    $("#liberSearchBox").html("");
  }

  //kerkim i avancuar sipas titullit dhe zhanerit ne qofte se eshte percaktuar
  if($("#sipasTitullit").is(":checked")){
    var titulli = $("#searchBox").val();
    if(titulli.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {titulli: titulli, zhaneri: zhaneri, type: "searchBox", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchBox").html(data);
        }
      });
    }
  //kerkim i avancuar sipas autorit dhe zhanerit ne qofte se eshte percaktuar
  }else if($("#sipasAutorit").is(":checked")){
    var autori = $("#searchBox").val();
    if(autori.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {autori: autori, zhaneri: zhaneri, type: "searchBox", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchBox").html(data);
        }
      });
    }
  //kerkim sipas titullit ose autorit, dhe zhanerit ne qofte se eshte percaktuar
  }else{
    var libri = $("#searchBox").val();
    if(libri.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {libri: libri, zhaneri: zhaneri, type: "searchBox", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchBox").html(data);
        }
      });
    }
  }
}


function kerkoSearchButton() {

  var perdorues_id = $("#info").data('perdorues_id');

  //mer zhanerin ne qofte se eshte i pranishe(kur shtypet butoni 'kerkim i avancuar')
  var zh = $("#zhaneri")[0];
  if(zh){
    var length = zh.options.length;
    var option;
    var zhaneri;
    for(var i = 0; i < length; i++){
      option = zh.options[i];
      if(option.selected === true){
        zhaneri = option.value;
        break;
      }
    }
  }

  //ne qofte se text box-i eshte bosh atehere hiqen te gjitha rezultat (te cilat mund te jene shfaqur me pare) nga divi
  if($("#searchBox").val() == ""){
    $("#liberSearchBox").html("");
  }

  //kerkim i avancuar sipas titullit dhe zhanerit ne qofte se eshte percaktuar
  if($("#sipasTitullit").is(":checked")){
    var titulli = $("#searchBox").val();
    if(titulli.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {titulli: titulli, zhaneri: zhaneri, type: "searchButton", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchButton").html(data);
          $("#searchBox").val("");
          $("#liberSearchBox").html("");
        }
      });
    }
  //kerkim i avancuar sipas autorit dhe zhanerit ne qofte se eshte percaktuar
  }else if($("#sipasAutorit").is(":checked")){
    var autori = $("#searchBox").val();
    if(autori.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {autori: autori, zhaneri: zhaneri, type: "searchButton", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchButton").html(data);
          $("#searchBox").val("");
          $("#liberSearchBox").html("");
        }
      });
    }
  //kerkim sipas titullit ose autorit, dhe zhanerit ne qofte se eshte percaktuar
  }else{
    var libri = $("#searchBox").val();
    if(libri.trim() != ""){
      $.post("kerkoLiberPerPerditesimPerdoruesi.php", {libri: libri, zhaneri: zhaneri, type: "searchButton", perdorues_id: perdorues_id, submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchButton").html(data);
          $("#searchBox").val("");
          $("#liberSearchBox").html("");
        }
      });
    }
  }
}


function hiqLiber(elem){
  var perdorues_id = $(elem).data('perdorues_id');
  var liber_id = $(elem).data('liber_id');

  $.post('hiqLiberNgaPerdoruesi.php',{
    perdorues_id: perdorues_id,
    liber_id: liber_id
  })
  .done(function (data) {
    if(data == "success"){
      $("#"+liber_id).remove();
    }else{
      alert("error");
    }
  })

  // $.post('librariaPerdoruesit.php');
}


// function showSearchBar(){
//   $("#showSearchBar").hide();
//   var searchBar = '<input type="text" name="searchBox" id="searchBox" placeholder="Kerko per liber" onkeyup="kerkoSearchBox()">'
//   searchBar += '<input type="submit" name="searchSubmit" value="Kerko" onclick="kerkoSearchButton()">'
//   searchBar += '<button type="button" id="kerkimIAvancuar" onclick="showKerkimIAvancuar()">Kerkim i avancuar</button>'
//   searchBar += '<div id="liberSearchBox"></div>'
//   searchBar += '<div id="liberSearchButton"></div>'
//   searchBar += '<div class="kerkimIAvancuarDiv"></div>'
//   $("#searchBar").html(searchBar);
// }

function shtoLibrin(elem) {
  var perdorues_id = $(elem).data("perdorues_id");
  var liber_id = $(elem).data("liber_id");
  // alert("libri u shtua "+liber_id+" "+perdorues_id);
  $.post("shtoLibrTekPerdoruesi.php",{
      perodrues_id: perdorues_id,
      liber_id: liber_id,
      submit: 1
  })
  .done(function (data){

    if(data.includes("success")){
      var infoMbiLibrin = data.split("++++");
      var titulli = infoMbiLibrin[1];
      var autori = infoMbiLibrin[2];
      var zhaneri = infoMbiLibrin[3];

      var content = '<tr id=';
      content += liber_id;
      content += '>';
      content += '<td>';
      content += titulli;
      content += '</td>';
      content += '<td>';
      content += autori;
      content += '</td>';
      content += '<td>';
      content += zhaneri;
      content += '</td>';
      content += '<td>';
      content += '<input type="submit" value="-" class="btn btn-danger" onclick="hiqLiber(this)" data-perdorues_id='+perdorues_id+' data-liber_id='+liber_id+'>';
      content += '</td>';
      content += '</tr>';
      console.log(content);
      $("#tabela1").append(content);
    }else if(data == "libri ndodhet"){
      alert("Libri ndodhet");
    }else if(data == "Nuk mund te merni me shume se 10 libra"){
      alert("Nuk mund te merni me shume se 10 libra");
    }else if(data == "Libri nuk eshte ne gjendje"){
      alert("Libri nuk eshte ne gjendje");
    }else{
      alert(data);
    }
  });
}

function kerkoPerdoruesSearchBox() {
  var perdorues = $("#searchBox").val();
  if(perdorues.trim() != ""){
    $.post("kerkoPerdoruesPerPerditesim.php", {perdorues: perdorues, type: "searchBox"})
    .done(function(data){
      if(data != "no results"){
        $("#perdoruesSearchBox").html(data);
      }
    });
  }else{
    $("#perdoruesSearchBox").html("");
  }
}

function kerkoPerdoruesSearchButton() {
  var perdorues = $("#searchBox").val();
  if(perdorues.trim() != ""){
    $.post("kerkoPerdoruesPerPerditesim.php", {perdorues: perdorues, type: "searchButton"})
    .done(function(data){
      if(data != "error"){
        $("#perdoruesSearchButton").html(data);
        $("#searchBox").val("");
        $("#perdoruesSearchBox").html("");
      }
    });
  }else{
    $("#perdoruesSearchButton").html("");
  }
}
