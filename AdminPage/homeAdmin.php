<!DOCTYPE html>
<html>
  <head>
    <title>Home Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="checkRezervimet.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/PW/AdminPage/Style/homeAdmin.css">
  </head>
  <body onload="hiqRezervimeTimeOut()">
    <?php
      session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        include_once("Style/headerAdmin.html");
        include_once("Style/backgroundAdmin.html");
        ?>
        <div class="allClass">
          <div class="functionsClass">
            <a href="menaxhoPerdorues.php"><button type="button" class="btn btn-secondary">Menaxho perdorues</button></a>
          </div>
          <div class="functionsClass">
            <a href="menaxhoLiber.php"><button type="button"class="btn btn-secondary" >Menaxho liber</button></a>
          </div>
          <div class="functionsClass">
            <a href="perditesoPerdorues.php"><button type="button" class="btn btn-secondary">Perditeso perdorues</button></a>
          </div>
        </div>
        <?php
      }else{
        header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
      }
     ?>
  </body>
</html>
