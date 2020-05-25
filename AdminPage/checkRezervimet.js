function checkRezervime(){
  $.post("checkRezervime.php", {submit:1})
  .done(function(data) {
      var teDhena = data.split("+++");
      var response = teDhena[0];
      var perdoruesId = teDhena[1];
      var liber_id = teDhena[2];
      if(response == "success"){
        console.log("U hoq nga rezervimi libri me id: "+liber_id+" i perdoruesit me id: "+perdoruesId);
      }else {
        console.log("Nuk u hoq liber nga rezervimi");
      }
  })
}

function hiqRezervimeTimeOut() {
  setInterval(checkRezervime, 1000);
}
