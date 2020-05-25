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
      $.post("kerkoLiber.php", {titulli: titulli, zhaneri: zhaneri, type: "searchBox", submit:1})
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
      $.post("kerkoLiber.php", {autori: autori, zhaneri: zhaneri, type: "searchBox", submit:1})
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
      $.post("kerkoLiber.php", {libri: libri, zhaneri: zhaneri, type: "searchBox", submit:1})
      .done(function(data){
        if(data != "no results"){
          $("#liberSearchBox").html(data);
        }
      });
    }
  }
}


function kerkoSearchButton() {

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
      $.post("kerkoLiber.php", {titulli: titulli, zhaneri: zhaneri, type: "searchButton", submit:1})
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
      $.post("kerkoLiber.php", {autori: autori, zhaneri: zhaneri, type: "searchButton", submit:1})
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
      $.post("kerkoLiber.php", {libri: libri, zhaneri: zhaneri, type: "searchButton", submit:1})
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
