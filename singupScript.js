function singup(){
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
    $.post("checkSingup.php",
      {emri: emri,
      mbiemri: mbiemri,
      username: username,
      password: password,
      mosha: mosha,
      gjinia: gjinia,
      email: email,
      adresa: adresa,
      submit:1})
      .done(function(data){
        if(data == "success"){
          window.location = "login.php";
        }else if(data == "username i zene"){
          alert("username i zene");
        }else if(data == "email i zene"){
          alert("email i zene");
        }else{
          alert(data);
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
