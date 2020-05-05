function login(){
  var username = $("#username").val();
  var password = $("#password").val();
  $.post("checklogin.php", {username: username, password: password, submit:1})
    .done(function(data){
      if(data == "success client"){
        window.location = "home.php";
        $("#informacion").hide();
      }else if(data == "success admin"){
        window.location = "http://localhost/PW/AdminPage/homeAdmin.php";
        $("#informacion").hide();
      }else {
        $("#informacion").show();
        $("#informacion").html("<p id='infoContent'>*username ose fjalekalimi i pasakte</p>");
      }
    });
}
