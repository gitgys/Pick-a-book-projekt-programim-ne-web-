function shtoLiber() {
  var barcode = $("#barcode").val().trim();
  var titulli = $("#titulli").val().trim();
  var autori = $("#autori").val().trim();
  var zh = $("#zhaneri")[0];
  var vitiIPublikimit = $("#vitiIPublikimit").val();
  var shtepiaBotuese = $("#shtepiaBotuese").val().trim();
  var sasia = $("#sasia").val().trim();
  var pershkrimi = $("#pershkrimi").val().trim();

  //file
  var fd = new FormData();
  var file = $("#file")[0].files[0];
  fd.append('file', file);
  // var file = $("#file").val();



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
     // {barcode: barcode,
     //  titulli: titulli,
     //  autori: autori,
     //  zhaneri: zhaneri,
     //  vitiIPublikimit: vitiIPublikimit,
     //  shtepiaBotuese: shtepiaBotuese,
     //  sasia: sasia,
     //  pershkrimi: pershkrimi,
     //  file: fd,
     //  submit: 1
    // })
    // .done(function(data){
    //   if(data == "success"){
    //     window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
    //   }else if(data == "libriNdodhet"){
    //     if(confirm('Ky libri ndodhet ne database, deshironi te perditesoni sasine e tije?')){
    //       $.post("checkShtoLiber.php",
    //        {barcode: barcode,
    //         titulli: titulli,
    //         autori: autori,
    //         zhaneri: zhaneri,
    //         vitiIPublikimit: vitiIPublikimit,
    //         shtepiaBotuese: shtepiaBotuese,
    //         sasia: sasia,
    //         pershkrimi: pershkrimi,
    //         file: fd,
    //         submit: 2
    //       })
    //       .done(function(data){
    //         if(data == "success"){
    //           window.location = "http://localhost/PW/AdminPage/menaxhoLiber.php";
    //         }else{
    //           alert(data);
    //         }
    //       })
    //     }
    //   }
    // });

    $.ajax({
      url: 'checkShtoLiber.php',
      enctype: 'multipart/form-data',
      type: 'post',
      file: fd,
      barcode: barcode,
       titulli: titulli,
       autori: autori,
       zhaneri: zhaneri,
       vitiIPublikimit: vitiIPublikimit,
       shtepiaBotuese: shtepiaBotuese,
       sasia: sasia,
       pershkrimi: pershkrimi,
       submit: 1,
      contentType: false,
      processData: false,
      success: function(data){
        if(data != "success"){
          alert("U shtua "+data);
        }else {
          alert("Nuk u shtua");
        }
      }

    })
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
    $.post("checkModifikimLiberi.php",
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
      }else if(data == "barcode i zene"){
        alert("barcode i zene");
      }else{
        alert("error");
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

  }else if(autori == ""){
    //Vendosni autorin

  }else if(zhaneri == null){
    //Vendosni zhanerin

  }else if(sasia == ""){
    //Vendosni sasine

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
