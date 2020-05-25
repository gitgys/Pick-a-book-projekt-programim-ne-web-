//funksion qe kontrollon ne qofte se nje email eshte i vlefshem
function crtlEmail(emaili){
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3,4})+$/;
  if(emaili.match(mailformat)){
    return true;
  }else{
    return false;
  }
}

//funksion qe modifikon kredencialet e perdoruesit
function modifikoPerdorues(){

  var perdoruesId = $("#perdoruesId").text();
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
  var roli = $("#roli").val();

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
    // $("#infoPassword").hide();
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
  }else if(mosha.trim() < 7){
    // $("#infoMosha").hide();
    $("#infoMosha").html("<p id = 'infoContent'>*vendos moshen me te madhe se 7</p>");
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
  }else if(roli.trim() == ""){
    //kontrolli i rolit
    $("#infoAdresa").hide();
    $("#infoEmail").hide();
    $("#infoRoli").html("<p id = 'infoContent'>*vendos rolin (1 per admin/0 per klient)</p>");
    $("#infoRoli").show();
  }else{
    // $.post("http://localhost/PW/AdminPage/checkModifikimPerdoruesit.php",
    //   {perdoruesId: perdoruesId,
    //   emri: emri,
    //   mbiemri: mbiemri,
    //   username: username,
    //   password: password,
    //   mosha: mosha,
    //   gjinia: gjinia,
    //   email: email,
    //   adresa: adresa,
    //   roli:roli,
    //   submit:1})
    //   .done(function(data){
    //     if(data == "success"){
    //       window.location = "http://localhost/PW/AdminPage/homeAdmin.php";
    //     }else if(data == "username i zene"){
    //       $("#infoUsername").html("<p id = 'infoContent'>*username i zene</p>");
    //       $("#infoUsername").show();
    //     }else if(data == "email i zene"){
    //       $("#infoEmail").html("<p id = 'infoContent'>*email i zene</p>");
    //       $("#infoEmail").show();
    //     }else{
    //       alert("error");
    //     }
    //   });


      var fd = new FormData();
      var file = $("#file")[0].files[0];
      fd.append('perdoruesId', perdoruesId);
      fd.append('emri', emri);
      fd.append('mbiemri', mbiemri);
      fd.append('username', username);
      fd.append('password', password);
      fd.append('mosha', mosha);
      fd.append('gjinia', gjinia);
      fd.append('email', email);
      fd.append('adresa', adresa);
      fd.append('file', file);
      fd.append('roli', roli);
      fd.append('submit', 1);


      $.ajax({
        url: 'http://localhost/PW/AdminPage/checkModifikimPerdoruesit.php',
        method: 'POST',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data){
          if(data == "success"){
            window.location = "http://localhost/PW/AdminPage/homeAdmin.php";
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


function fshiPerdorues(){
  var perdoruesId = $("#perdoruesId").text().trim();
  var emri = $("#emri").val().trim();
  var mbiemri = $("#mbiemri").val().trim();
  var username = $("#username").val().trim();
  var password = $("#password").val().trim();
  var confirmPassword = $("#confirmPassword").val().trim();
  var mosha = $("#mosha").val().trim();
  var gjinia;
  var mashkull = $("#mashkull");
  var femer = $("#femer");
  var other = $("#other");
  var email = $("#email").val().trim();
  var adresa = $("#adresa").val().trim();
  var gjiniaChecked = false;
  var roli = $("#roli").val().trim();

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

  $.post("http://localhost/PW/AdminPage/checkFshirjaPerdoruesit.php",
      {perdoruesId: perdoruesId,
      emri: emri,
      mbiemri: mbiemri,
      username: username,
      password: password,
      mosha: mosha,
      gjinia: gjinia,
      email: email,
      adresa: adresa,
      roli:roli,
      submit:1})
      .done(function(data){
        if(data == "success"){
          window.location = "http://localhost/PW/AdminPage/homeAdmin.php";
        }else if(data == "error"){
          alert(data);
          $("#infoFshi").html("<p id = 'infoContent'>*perdoruesi nuk gjendet</p>");
        }else{
          alert(data);
          $("#infoFshi").html("<p id = 'infoContent'>*gabim te dhenash</p>");
        }
      });
}


function shtoPerdorues(){
  var emri = $("#emri").val();
  var mbiemri = $("#mbiemri").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();
  var mosha = $("#mosha").val();
  //gjinia
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
    $("#infoEmri").html("<p id='infoContent'>*vendos emrin</p>");
    $("#infoEmri").show();
  }else if(mbiemri.trim() == ""){
    //kontrolli i mbiemrit
    $("#infoEmri").hide();
    $("#infoMbiemri").html("<p id='infoContent'>*vendos mbiemrin</p>");
    $("#infoMbiemri").show();
  }else if(username.trim() == ""){
    //kontrolli i username
    $("#infoMbiemri").hide();
    $("#infoUsername").html("<p id='infoContent'>*vendos username-in</p>");
    $("#infoUsername").show();
  }else if(password.trim() == ""){
    //kontrolli i password
    $("#infoUsername").hide();
    $("#infoPassword").html("<p id='infoContent'>*vendos fjalekalimin</p>");
    $("#infoPassword").show();
  }else if(password.trim().length < 8){
    // $("#infoPassword").hide();
    $("#infoPassword").html("<p id='infoContent'>*fjalekalimi i shkurter</p>");
    $("#infoPassword").show();
  }else if(confirmPassword.trim() == ""){
    //kontrolli i confirmPassword
    $("#infoPassword").hide();
    $("#infoConfirmPassword").html("<p id='infoContent'>*konfirmo fjalekalimin</p>");
    $("#infoConfirmPassword").show();
  }else if(password.trim() != confirmPassword.trim()){
    // $("#infoPassword").hide();
    $("#infoConfirmPassword").html("<p id='infoContent'>*konfirmo sakte fjalekalimin</p>");
    $("#infoConfirmPassword").show();
  }else if(mosha.trim() == ""){
    //kontrolli i moshes
    $("#infoConfirmPassword").hide();
    $("#infoMosha").html("<p id='infoContent'>*vendos moshen</p>");
    $("#infoMosha").show();
    $("#infoPassword").hide();
  }else if(mosha.trim() < 7){
    // $("#infoMosha").hide();
    $("#infoMosha").html("<p id='infoContent'>*vendos moshen me te madhe se 7</p>");
    $("#infoMosha").show();
    $("#infoPassword").hide();
  }else if(gjiniaChecked == false){
    $("#infoMosha").hide();
    $("#infoGjinia").html("<p id='infoContent'>*vendos gjinine</p>");
    $("#infoGjinia").show();
    $("#infoPassword").hide();
  }else if(email.trim() == ""){
    //kontrolli i emailit
    $("#infoGjinia").hide();
    $("#infoEmail").html("<p id='infoContent'>*vendos emailin</p>");
    $("#infoEmail").show();
    $("#infoPassword").hide();
  }else if(crtlEmail(email) == false){
    // $("#infoMosha").hide();
    $("#infoEmail").html("<p id='infoContent'>*vendos email te vlefshem</p>");
    $("#infoEmail").show();
    $("#infoPassword").hide();
  }else if(adresa.trim() == ""){
    //kontrolli i adreses
    $("#infoPassword").hide();
    $("#infoEmail").hide();
    $("#infoAdresa").html("<p id='infoContent'>*vendos adresen</p>");
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
      url: 'checkShtimiPerdoruesit.php',
      method: 'POST',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data){
        if(data == "success"){
          window.location = "http://localhost/PW/AdminPage/menaxhoPerdorues.php";
        }else if(data == "username i zene"){
          alert("username i zene");
        }else if(data == "email i zene"){
          alert("email i zene");
        }else{
          alert("error");
        }
      }
    });
  }
}

//funksion qe kontrollon ne qofte se nje email eshte i vlefshem
function crtlEmail(emaili){
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3,4})+$/;
  if(emaili.match(mailformat)){
    return true;
  }else{
    return false;
  }
}
