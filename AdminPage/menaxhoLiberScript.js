function shtoLiber() {
  var barcode = $("#barcode").val().trim();
  var titulli = $("#titulli").val().trim();
  var autori = $("#autori").val().trim();
  var zh = $("#zhaneri")[0];
  var vitiIPublikimit = $("#vitiIPublikimit").val();
  var shtepiaBotuese = $("#shtepiaBotuese").val().trim();
  var sasia = $("#sasia").val().trim();
  var pershkrimi = $("#pershkrimi").val().trim();


  var length = zh.options.length;
  var option;
  var zhaneri;
  for(var i = 1; i < length; i++){
    option = zh.options[i];
    if(option.selected === true){
      zhaneri = option.value;
      break;
    }
  }

  if(titulli == ""){
    //Vendosni titulin
    $("#infoTitulli").html("<p>*vendosni titullin</p>");
  }else if(autori == ""){
    //Vendosni autorin
    $("#infoAutori").html("<p>*vendosni autorin</p>");
    $("#infoTitulli").html("");
  }else if(zhaneri == null){
    //Vendosni zhanerin
    $("#infoZhaneri").html("<p>*vendosni zhanerin</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");
  }else if(sasia == ""){
    //Vendosni sasine
    $("#infoSasia").html("<p>*vendosni sasine</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");
    $("#infoZhaneri").html("");
  }else{

    // $.post("checkShtoLiber.php",
    //  {barcode: barcode,
    //   titulli: titulli,
    //   autori: autori,
    //   zhaneri: zhaneri,
    //   vitiIPublikimit: vitiIPublikimit,
    //   shtepiaBotuese: shtepiaBotuese,
    //   sasia: sasia,
    //   pershkrimi: pershkrimi,
    //   submit: 1
    // })
    // .done(function(data){
    //   if(data == "success"){
    //     window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
    //   }else if(data == "libriNdodhet"){
    //       alert("libri ndodhet");
    //     }else {
    //       alert(data);
    //     }
    // });



    var fd = new FormData();
    var file = $("#file")[0].files[0];

    fd.append('barcode', barcode);
    fd.append('titulli', titulli);
    fd.append('autori', autori);
    fd.append('zhaneri', zhaneri);
    fd.append('vitiIPublikimit', vitiIPublikimit);
    fd.append('shtepiaBotuese', shtepiaBotuese);
    fd.append('sasia', sasia);
    fd.append('file', file);
    fd.append('submit', 1);
    fd.append('pershkrimi', pershkrimi);

    $.ajax({
      url: 'http://localhost/PW/AdminPage/checkShtoLiber.php',
      method: 'POST',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data){
        if(data == "success"){
          window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
          alert("U shtua");
        }else {
          alert("Nuk u shtua");
        }
      }
    });

  }
}








function modifikoLiber() {
  var barcode = $("#barcode").val().trim();
  var titulli = $("#titulli").val().trim();
  var autori = $("#autori").val().trim();
  var zh = $("#zhaneri")[0];
  var vitiIPublikimit = $("#vitiIPublikimit").val();
  var shtepiaBotuese = $("#shtepiaBotuese").val().trim();
  var sasia = $("#sasia").val().trim();
  var pershkrimi = $("#pershkrimi").val().trim();

  var length = zh.options.length;
  var option;
  var zhaneri;
  for(var i = 1; i < length; i++){
    option = zh.options[i];
    if(option.selected === true){
      zhaneri = option.value;
      break;
    }
  }

  if(titulli == ""){
    //Vendosni titulin
    $("#infoTitulli").html("<p>*vendosni titullin</p>");
  }else if(autori == ""){
    //Vendosni autorin
    $("#infoAutori").html("<p>*vendosni autorin</p>");
    $("#infoTitulli").html("");
  }else if(zhaneri == null){
    //Vendosni zhanerin
    $("#infoZhaneri").html("<p>*vendosni zhanerin</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");
  }else if(sasia == ""){
    //Vendosni sasine
    $("#infoSasia").html("<p>*vendosni sasine</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");
    $("#infoZhaneri").html("");
  }else{


    var fd = new FormData();
    var file = $("#file")[0].files[0];



    fd.append('barcode', barcode);
    fd.append('titulli', titulli);
    fd.append('autori', autori);
    fd.append('zhaneri', zhaneri);
    fd.append('vitiIPublikimit', vitiIPublikimit);
    fd.append('shtepiaBotuese', shtepiaBotuese);
    fd.append('sasia', sasia);
    fd.append('file', file);
    fd.append('pershkrimi', pershkrimi);
    fd.append('submit', 1);


    $.ajax({
      url: 'checkModifikimLiberi.php',
      method: 'POST',
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function(data){
        if(data == "success"){
          window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
          alert("U shtua");
        }else if(data == "barcode i zene"){
          alert("barcode i zene");
        }else {
          alert("error"+data);
        }
      }
    });

  }
}


function fshiLiber(){

  var barcode = $("#barcode").val().trim();
  var titulli = $("#titulli").val().trim();
  var autori = $("#autori").val().trim();
  var zh = $("#zhaneri")[0];
  var vitiIPublikimit = $("#vitiIPublikimit").val();
  var shtepiaBotuese = $("#shtepiaBotuese").val().trim();
  var sasia = $("#sasia").val().trim();
  var pershkrimi = $("#pershkrimi").val();

  console.log(vitiIPublikimit);

  var length = zh.options.length;
  var option;
  var zhaneri;
  for(var i = 1; i < length; i++){
    option = zh.options[i];
    if(option.selected === true){
      zhaneri = option.value;
      break;
    }
  }

  if(titulli == ""){
    //Vendosni titulin
    $("#infoTitulli").html("<p>*vendosni titullin</p>");

  }else if(autori == ""){
    //Vendosni autorin
    $("#infoAutori").html("<p>*vendosni autorin</p>");
    $("#infoTitulli").html("");

  }else if(zhaneri == null){
    //Vendosni zhanerin
    $("#infoZhaneri").html("<p>*vendosni zhanerin</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");

  }else if(sasia == ""){
    //Vendosni sasine
    $("#infoSasia").html("<p>*vendosni sasine</p>");
    $("#infoTitulli").html("");
    $("#infoAutori").html("");
    $("#infoZhaneri").html("");

  }else{
    $.post("checkFshirjaLibrit.php",
     {barcode: barcode,
      titulli: titulli,
      autori: autori,
      zhaneri: zhaneri,
      vitiIPublikimit: vitiIPublikimit,
      shtepiaBotuese: shtepiaBotuese,
      sasia: sasia,
      pershkrimi: pershkrimi,
      submit: 1
    })
    .done(function(data){
      if(data == "success"){
        window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
      }else{
        alert(data);
      }
    });
  }
}
