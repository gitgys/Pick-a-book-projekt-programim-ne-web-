function login(){
  var username = $("#username").val();
  var password = $("#password").val();
  $.post("checklogin.php", {username: username, password: password, submit:1})
    .done(function(data){
      if(data == "success client"){
        window.location = "http://localhost/PW/Client/home.php";
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


function showThenie() {
  var thenie = [
    '<p id="thenia">“Duhet të bëni kujdes prej librave, çfarë është brenda tyre, fjalët, kanë fuqinë të na ndryshojnë.”</p><p id="autori"> ― Cassandra Clare</p>',
    '<p id="thenia">“Mos lexoni siç bëjnë fëmijët, për t’u zbavitur apo siç bëjnë ambiciozët për të mësuar. Jo, lexoni që të jetoni.”</p><p id="autori"> ― Gustave Flaubert</p>',
    '<p id="thenia">“Nëse ka ndonjë libër që do ta lexosh, por nuk është shkruar akoma, atëherë duhet ta shkruash ti.”</p><p id="autori"> ― Toni Morrison</p>',
    '<p id="thenia">“Kur ke mbaruar së lexuari një libër, dëshiron ta kishe autorin që e ka shkruar mik, që të mund t’i telefonoje dhe t’i tregoje si ndihesh. Kjo nuk para ndodh.”</p><p id="autori"> ― J.D. Salinger</p>',
    '<p id="thenia">“E kam imagjinuar gjithnjë Parajsën si një lloj biblioteke.”</p><p id="autori"> ― Jorge Luis Borges</p>',
    '<p id="thenia">“Miq të mirë, libra të mirë dhe një ndërgjegje e qetë: kjo është jeta ideale.”</p><p id="autori"> ― Mark Twain</p>',
    '<p id="thenia">“Kaq shumë libra, kaq pak kohë.”</p><p id="autori"> ― Frank Zappa</p>',
    '<p id="thenia">“Nëse lexon vetëm librat që i lexojnë të githë, do të mendosh vetëm gjërat që i mendojnë të gjithë.”</p><p id="autori"> ― Haruki Murakami</p>',
    '<p id="thenia">“Kur kam pak para, blej libra; dhe kur më tepron ndonjë gjë prej tyre, blej ushqim dhe veshje.”</p><p id="autori"> ― Desiderius Erasmus</p>',
    '<p id="thenia">“Ku është natyra njerëzore më e brishtë se në një librari?”</p><p id="autori"> ― Henry Ward Beecher</p>',
    '<p id="thenia">“S’mund të jetoj pa libra.”</p><p id="autori"> ― Thomas Jefferson</p>',
    '<p id="thenia">“Ka dy arsye për të lexuar një libër: një, të shijon leximi; tjetra: mund të mburresh rreth tij.”</p><p id="autori"> ―  Bertrand Russell</p>',
    '<p id="thenia">“Librat janë kaq të veçantë, të rrallë dhe të tuat, saqë të tregosh se çfarë ndien për to duket si tradhti.”</p><p id="autori"> ― John Green</p>',
    '<p id="thenia">“Ka krime më të këqija se djegia e librave. Një prej tyre është të mos i lexosh.”</p><p id="autori"> ― Joseph Brodsky</p>',
    '<p id="thenia">“Mendo përpara se të flasësh. Lexo përpara se të mendosh.”</p><p id="autori"> ―  Frances Ann Lebowitz</p>',
    '<p id="thenia">“Nëse ke një kopsht dhe një bibliotekë, atëherë ke gjithçka që të duhet.”</p><p id="autori"> ― Cicero</p>',
    '<p id="thenia">“Lexova një libër një ditë dhe e gjithë jeta ime ndryshoi.”</p><p id="autori"> ― Orhan Pamuk</p>',
    '<p id="thenia">“Librat janë aeroplani, treni, rruga. Ata janë destinacioni dhe udhëtimi. Ata janë shtëpia.”</p><p id="autori"> ― Anna Quindlen</p>'
  ];

  var position = Math.floor(Math.random()  * thenie.length);

  $("#theniet").html(thenie[position]);
  $("#theniet").hide();
  $("#theniet").show("slow");
}
