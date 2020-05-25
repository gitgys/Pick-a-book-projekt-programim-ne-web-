 <!DOCTYPE html>
 <html>
   <head>
     <title>Shto perdorues</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="http://localhost/PW/AdminPage/menaxhoPerdoruesScript.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="http://localhost/PW/Log%20in%20&%20Sing%20up/singupStyle.css">

     <style media="screen">
      <?php
        include_once("Style/shtoPerdorues.css");
       ?>
     </style>

   </head>
   <body>

    <?php
     session_start();
     if(isset($_SESSION['username']) && isset($_SESSION['password'])){
       include_once("Style/headerAdmin.html");
       include_once("Style/backgroundAdmin.html");
       ?>
       <div class="allClass">
         <div id="all">
           <h3>Shto Perdorues</h3>
           <div id="emeriDiv">
           Emri <input type="text" class="form-control" name="emri" id="emri" placeholder="Emri">
             <div id="infoEmri"></div>
           </div>
           <div id="mbiemriDiv">
           Mbiemri <input type="text" class="form-control" name="mbiemri" id="mbiemri" placeholder="Mbiemri">
             <div id="infoMbiemri"></div>
           </div>
           <div id="usernameDiv">
           Username <input type="text" class="form-control" name="username" id="username" placeholder="Username">
             <div id="infoUsername"></div>
           </div>
           <div id="passwordDiv">
           Password <input type="password" class="form-control" name="password" id="password" placeholder="Password">
             <div id="infoPassword"></div>
           </div>
           <div id="confirmPasswordDiv">
           Confirm password <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
             <div id="infoConfirmPassword"></div>
           </div>
           <div id="moshaDiv">
           Mosha <input type="number" class="form-control" name="mosha" id="mosha" placeholder="Mosha">
             <div id="infoMosha"></div>
           </div>
           <div id="gjiniaDiv">
             Gjinia:
             <input type="radio" name="gjinia" id="mashkull">
             <label for="mashkull">Mashkull</label>
             <input type="radio" name="gjinia" id="femer">
             <label for="femer">Femer</label>
             <input type="radio" name="gjinia" id="other">
             <label for="other">Other</label>
             <div id="infoGjinia"></div>
           </div>
           <div id="emailDiv">
             E-mail <input type="text" class="form-control" name="email" id="email" placeholder="e-mail">
           </div>
             <div id="infoEmail"></div>
           <div id="adresaDiv">
             Adresa <input type="text" class="form-control" name="adresa" id="adresa" placeholder="Adresa">
           </div>
             <div id="infoAdresa"></div>
             <div>
              <input type="file" name="file" id="file">
             </div>
           <div id="buttonatDiv">
             <div id="singupDiv">
               <input type="submit" class="btn btn-success"name="singup" id="singup" value="Shto Perdorues" onclick="shtoPerdorues()">
             </div>
             <div id="backDiv">
               <a href="http://localhost/PW/AdminPage/menaxhoPerdorues.php"><input type="submit" class="btn btn-success" name="back" id="back" value="Back"></a>
             </div>
           </div>
         </div>
     </div>
   </body>
 </html>
 <?php
}else{
  header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
}
?>
