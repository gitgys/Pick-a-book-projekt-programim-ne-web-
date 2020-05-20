<?php

if(!isset($_REQUEST['perdoruesId'])){
  header("location: http://localhost/PW/AdminPage/menaxhoPerdorues.php");
}else{
  $perdoruesId = $_REQUEST['perdoruesId'];
  //lidhja me databasen dhe marrja e kredencialeve per perdoruein qe kerkohet te modifikohet
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $query = "select * from PERDORUES where perdoruesId = $perdoruesId";
  $results = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($results, MYSQLI_BOTH);

  $emri = $row['emri'];
  $mbiemri = $row['mbiemri'];
  $username = $row['username'];
  $password = $row['password'];
  $mosha = $row['mosha'];
  $gjinia = $row['gjinia'];
  $email = $row['email'];
  $adresa = $row['adresa'];
  $roli = $row['roli'];

  session_start();
  //username dhe email-i fillestar i perdoruesit
  $_SESSION['usernameFillestar'] = $username;
  $_SESSION['emailFillestar'] = $email;
  include_once("Style/headerAdmin.html");
  include_once("Style/backgroundAdmin.html");
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modifiko perdorues</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://localhost/PW/AdminPage/menaxhoPerdoruesScript.js"></script>
    <style media="screen">
      <?php
        include_once("Style/modifikoPerdorues.css");
       ?>
    </style>
  </head>
  <body>
    <div class="allClass">
      <div id="all">
        <h3>Modifiko</h3>
        <div id="emeriDiv">
          Emri <input type="text" class="form-control" name="emri" id="emri" placeholder="Emri" value="<?php echo $emri ?>">
          <div id="infoEmri"></div>
        </div>
        <div id="mbiemriDiv">
          Mbiemri <input type="text" class="form-control" name="mbiemri" id="mbiemri" placeholder="Mbiemri" value="<?php echo $mbiemri ?>">
          <div id="infoMbiemri"></div>
        </div>
        <div id="usernameDiv">
          Username <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username ?>">
          <div id="infoUsername"></div>
        </div>
        <div id="passwordDiv">
          Password <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password ?>">
          <div id="infoPassword"></div>
        </div>
        <div id="confirmPasswordDiv">
          Confirm password <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" value="<?php echo $password ?>">
          <div id="infoConfirmPassword"></div>
        </div>
        <div id="moshaDiv">
          Mosha <input type="number" class="form-control" name="mosha" id="mosha" placeholder="Mosha" value="<?php echo $mosha ?>">
          <div id="infoMosha"></div>
        </div>
        <div id="gjiniaDiv">
          Gjinia:
          <?php
            if($gjinia == 'm'){
              ?>
              <input type="radio" name="gjinia" id="mashkull" checked>
              <label for="mashkull">Mashkull</label>
              <input type="radio" name="gjinia" id="femer">
              <label for="femer">Femer</label>
              <input type="radio" name="gjinia" id="other">
              <label for="other">Other</label>
              <?php
            }else if($gjinia == 'f'){
              ?>
              <input type="radio" name="gjinia" id="mashkull">
              <label for="mashkull">Mashkull</label>
              <input type="radio" name="gjinia" id="femer" checked>
              <label for="femer">Femer</label>
              <input type="radio" name="gjinia" id="other">
              <label for="other">Other</label>
              <?php
            }else{
              ?>
              <input type="radio" name="gjinia" id="mashkull">
              <label for="mashkull">Mashkull</label>
              <input type="radio" name="gjinia" id="femer">
              <label for="femer">Femer</label>
              <input type="radio" name="gjinia" id="other" checked>
              <label for="other">Other</label>
              <?php
            }
           ?>
          <div id="infoGjinia"></div>
        </div>
        <div id="emailDiv">
          E-mail <input type="text" class="form-control" name="email" id="email" placeholder="e-mail" value="<?php echo $email ?>">
        </div>
        <div id="infoEmail"></div>
        <div id="adresaDiv">
          Adresa <input type="text" class="form-control" name="adresa" id="adresa" placeholder="Adresa" value="<?php echo $adresa ?>">
        </div>
        <div id="infoAdresa"></div>
        <div id="roliDiv">
          Roli <input type="number" class="form-control" min="0" max="1" name="roli" id="roli" placeholder="Roli" value="<?php echo $roli ?>">
        </div>
        <div id="infoRoli"></div>
        <div id="buttonatDiv">
          <div id="modifikoDiv">
            <input type="submit" class="btn btn-success" name="modifiko" id="modifiko" value="Modifiko" onclick="modifikoPerdorues()">
          </div>
          <div id="fshiDiv">
            <input type="submit" class="btn btn-success" name="fshi" id="fshi" value="Fshi" onclick="fshiPerdorues()">
            <div id="infoFshi"></div>
          </div>
          <div id="backDiv">
            <a href="menaxhoPerdorues.php"><input type="submit" class="btn btn-success" name="back" id="back" value="Back"></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
}
 ?>
