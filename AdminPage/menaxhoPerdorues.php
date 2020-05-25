<!DOCTYPE html>
<html>
  <head>
    <title>Menaxho perdorues</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="kerkoPerdorues.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/PW/AdminPage/Style/menaxhoPerdorues.css">
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
            <input type="text" name="searchBox" id="searchBox" placeholder="Kerko perdorues" onkeyup="kerkoSearchBox()">
            <div id="perdoruesSearchBox"></div>
          </div>
          <div class="searchButton">
            <input type="submit" name="searchSubmit" class="btn btn-secondary" value="Kerko" onclick="kerkoSearchButton()">
          </div>
        </div>

        <div class="a">
          <div class="functionsClass">
            <a href="shtoPerdorues.php"><button type="button" class="btn btn-success" id="shtoPerdorues">Shto Perdorues</button></a>
          </div>
          <div class="functionsClass">
            <a href="homeAdmin.php"><button type="button" class="btn btn-secondary" id="back">Back</button></a>
          </div>
        </div>
        <div id="perdoruesSearchButton"></div>
        </div>
      <?php
    }else{
      header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
    }?>
  </body>
</html>
