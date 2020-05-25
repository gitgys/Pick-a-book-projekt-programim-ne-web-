//funksion qe kontrollon ne qofte se nje email eshte i vlefshem
function crtlEmail(emaili){
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3,4})+$/;
  if(emaili.match(mailformat)){
    return true;
  }else{
    return false;
  }
}

function modifikoTeDhenat(){

  var emri = $("#emri").val();
  var mbiemri = $("#mbiemri").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();
  var mosha = $("#mosha").val();
  var gjinia;
  var mashkull = $("#mashkull");
  var femer = $("#femer");
  var other = $("#other");
  var email = $("#email").val();
  var adresa = $("#adresa").val();
  var gjiniaChecked = false;


  //kontrollojm fushat ne qofte se jane plotesuar sakte
  //kontrolli i gjinise
  if(mashkull.is(":checked")){
    gjiniaChecked = true;
    gjinia = "m";
  }else if(femer.is(":checked")){
    gjiniaChecked = true;
    gjinia = "f";
  }else if(other.is(":checked")){
    gjiniaChecked = true;
    gjinia = "o";
  }

  //kontrolli i emrit
  if(emri.trim() == ""){
    $("#infoEmri").html("<p id = 'infoContent'>*vendos emrin</p>");
    $("#infoEmri").show();
  }else if(mbiemri.trim() == ""){
    //kontrolli i mbiemrit
    $("#infoEmri").hide();
    $("#infoMbiemri").html("<p id = 'infoContent'>*vendos mbiemrin</p>");
    $("#infoMbiemri").show();
  }else if(username.trim() == ""){
    //kontrolli i username
    $("#infoMbiemri").hide();
    $("#infoUsername").html("<p id = 'infoContent'>*vendos username-in</p>");
    $("#infoUsername").show();
  }else if(password.trim() == ""){
    //kontrolli i password
    $("#infoUsername").hide();
    $("#infoPassword").html("<p id = 'infoContent'>*vendos fjalekalimin</p>");
    $("#infoPassword").show();
  }else if(password.trim().length < 8){
    $("#infoPassword").hide();
    $("#infoPassword").html("<p id = 'infoContent'>*fjalekalimi i shkurter</p>");
    $("#infoPassword").show();
  }else if(confirmPassword.trim() == ""){
    //kontrolli i confirmPassword
    $("#infoPassword").hide();
    $("#infoConfirmPassword").show();
  }else if(password.trim() != confirmPassword.trim()){
    // $("#infoPassword").hide();
    $("#infoConfirmPassword").html("<p id = 'infoContent'>*konfirmo fjalekalimin</p>");
    $("#infoConfirmPassword").html("<p id = 'infoContent'>*konfirmo sakte fjalekalimin</p>");
    $("#infoConfirmPassword").show();
  }else if(mosha.trim() == ""){
    //kontrolli i moshes
    $("#infoConfirmPassword").hide();
    $("#infoMosha").html("<p id = 'infoContent'>*vendos moshen</p>");
    $("#infoMosha").show();
    $("#infoPassword").hide();
  }else if(gjiniaChecked == false){
    $("#infoMosha").hide();
    $("#infoGjinia").html("<p id = 'infoContent'>*vendos gjinine</p>");
    $("#infoGjinia").show();
    $("#infoPassword").hide();
  }else if(email.trim() == ""){
    //kontrolli i emailit
    $("#infoGjinia").hide();
    $("#infoEmail").html("<p id = 'infoContent'>*vendos emailin</p>");
    $("#infoEmail").show();
    $("#infoPassword").hide();
  }else if(crtlEmail(email) == false){
    // $("#infoMosha").hide();
    $("#infoEmail").html("<p id = 'infoContent'>*vendos email te vlefshem</p>");
    $("#infoEmail").show();
    $("#infoPassword").hide();
  }else if(adresa.trim() == ""){
    //kontrolli i adreses
    $("#infoPassword").hide();
    $("#infoEmail").hide();
    $("#infoAdresa").html("<p id = 'infoContent'>*vendos adresen</p>");
    $("#infoAdresa").show();
  }else{

    var fd = new FormData();
    var file = $("#file")[0].files[0];

    fd.append('emri', emri);
    fd.append('mbiemri', mbiemri);
    fd.append('username', username);
    fd.append('password', password);
    fd.append('mosha', mosha);
    fd.append('gjinia', gjinia);
    fd.append('email', email);
    fd.append('adresa', adresa);
    fd.append('file', file);
    fd.append('submit', 1);

    $.ajax({
      url: 'http://localhost/PW/Client/checkModifikimiITeDhenave.php',
      method: 'POST',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data){
        if(data == "success"){
          window.location = "http://localhost/PW/Client/profili.php";
        }else if(data == "username i zene"){
          $("#infoUsername").html("<p id = 'infoContent'>*username i zene</p>");
          $("#infoUsername").show();
        }else if(data == "email i zene"){
          $("#infoEmail").html("<p id = 'infoContent'>*email i zene</p>");
          $("#infoEmail").show();
        }else{
          alert("error"+data);
        }
      }
    });

  }
}

function rezervo(elem) {
  var liber_id = $(elem).data("liber_id");

  $.post("rezervo.php",
        {liber_id: liber_id,
        submit: 1})
        .done(function(data){
          if(data == "success"){
            alert("Libri u rezervua.");
          }else if(data == "libri eshte rezervuar me pare"){
            alert("Libri eshte rezervuar me pare.");
          }else if(data == "Libri nuk eshte ne gjendje"){
            alert("Libri nuk eshte ne gjendje");
          }else if(data == "Nuk mund te beni me shume se 10 rezervime"){
            alert("Nuk mund te beni me shume se 10 rezervime");
          }else {
            alert("Gabim gjate rezervimit te librit.");
          }
        });
}


function hiqRezervim(elem){
  var liber_id = $(elem).data("liber_id");

  $.post("hiqRezervim.php",{
    liber_id: liber_id,
    submit: 1
  })
  .done(function(data){
    if(data=="success"){
      $("#"+liber_id).remove();
    }else {
      alert("error");
    }
  })
}


function checkRezervime(){
  $.post("checkRezervime.php", {submit:1})
  .done(function(data) {
    var teDhenat = data.split(":");
    var response = teDhenat[0];
    var liber_id = teDhenat[1];

      if(response == "success"){
        $("#"+liber_id).remove();
        console.log("u hoq nga rezervimi");
      }else {
        console.log("nuk u hoq nga rezervimi");
      }
  })
}

function hiqRezervimeTimeOut() {
  setInterval(checkRezervime, 1000);
}
