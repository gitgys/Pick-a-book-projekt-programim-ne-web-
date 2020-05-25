<!DOCTYPE html>
<html>
  <head>
    <title>Menaxho liber</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="kerkoLiber.js"></script>
    <style media="screen">
      <?php
        include_once("Style/menaxhoLiber.css");
       ?>
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      include_once("Style/headerAdmin.html");
      include_once("Style/backgroundAdmin.html");
      ?>
      <div class="allClass">
        <div class="search">
          <div class="searchBox">
            <input type="text" name="searchBox" id="searchBox" placeholder="Kerko per liber" onkeyup="kerkoSearchBox()">
            <div id="liberSearchBox"></div>
          </div>
          <div class="searchButton">
            <div class="kerko">
              <input type="submit" name="searchSubmit" class="btn btn-secondary" value="Kerko" onclick="kerkoSearchButton()">
            </div>
            <div class="kerkimIAvancuar">
              <button type="button" id="kerkimIAvancuar" class="btn btn-secondary" onclick="showKerkimIAvancuar()">Kerkim i avancuar</button>
              <div class="kerkimIAvancuarDiv"></div>
            </div>
          </div>
        </div>

        <div class="functions">
          <div class="shto">
            <a href="shtoLiber.php"><button type="button" class="btn btn-success" id = "shtoLiber">Shto liber</button></a>
          </div>
          <div class="back">
            <a href="homeAdmin.php"><button type="button" class="btn btn-secondary" id = "back">Back</button></a>
          </div>
        </div>

        <div id="liberSearchButton"></div>

      </div>
      <?php
    }else{
      header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
    }?>
  </body>
</html>
