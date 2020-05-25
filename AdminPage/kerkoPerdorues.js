function kerkoSearchBox() {
  var perdorues = $("#searchBox").val();
  if(perdorues.trim() != ""){
    $.post("kerkoPerdorues.php", {perdorues: perdorues, type: "searchBox"})
    .done(function(data){
      if(data != "no results"){
        $("#perdoruesSearchBox").html(data);
      }
    });
  }else{
    $("#perdoruesSearchBox").html("");
  }
}

function kerkoSearchButton() {
  var perdorues = $("#searchBox").val();
  if(perdorues.trim() != ""){
    $.post("kerkoPerdorues.php", {perdorues: perdorues, type: "searchButton"})
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
