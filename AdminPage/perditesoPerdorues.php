<!DOCTYPE html>
<html>
  <head>
    <title>Perditeso perdorues</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="perditesoPerdorues.js"></script>
    <link rel="stylesheet" href="Style/perditesoPerdoruesin.css">
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
            <input type="text" name="searchBox" id="searchBox" placeholder="Kerko perdorues" onkeyup="kerkoPerdoruesSearchBox()">
            <div id="perdoruesSearchBox"></div>
          </div>
          <div class="kerko">
            <input type="submit" name="searchSubmit" class="btn btn-secondary" style="margin-right:5px;" value="Kerko" onclick="kerkoPerdoruesSearchButton()">
            <a href="homeAdmin.php"><button type="button" id="back" class="btn btn-secondary">Back</button></a>
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
