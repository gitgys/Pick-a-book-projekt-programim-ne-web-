<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/PW/Client/clientScript.js"></script>
    <script type="text/javascript" src="http://localhost/PW/Client/kerkoLiber.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/home.css">
  </head>
  <body>
    <?php
      session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        $username = $_SESSION['username'];
     ?>
     <div class="all">
       <?php
       include_once("Style/header.php");
        ?>

       <div class="buttons">
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

       </div>
       <div class="librat">
         <div id="liberSearchButton"></div>
         <?php

          include_once("showLibrat.php");

              $librat = merLibra();
              if(isset($_REQUEST['change'])){
                $start = $_REQUEST['page'];
                showLibrat($start);
              }else {
                $start = 0;
                showLibrat($start);
              }
              ?>
              <div class="paraPas">

              <?php
              if($start <= 9){
                ?>
                <a href="http://localhost/PW/Client/home.php?change=1&page=0"><button type="button" name="button" class="btn btn-outline-dark" id="previous">Para</button></a>
                <div class="space"></div>
                <a href="http://localhost/PW/Client/home.php?change=1&page=<?php echo $start+9; ?>"><button type="button" name="button" class="btn btn-outline-dark" id="next">Pas</button></a>
                <?php
              }else if($_REQUEST['page'] > count($librat)){
                ?>
                <a href="http://localhost/PW/Client/home.php?change=1&page=<?php echo $start-9; ?>"><button type="button" name="button" class="btn btn-outline-dark" id="previous">Para</button></a>
                <div class="space"></div>
                <a href="http://localhost/PW/Client/home.php?change=1&page=<?php echo $start+9; ?>"><button type="button" name="button" class="btn btn-outline-dark" id="next">Pas</button></a>
                <?php
              }else {
                ?>
                <a href="http://localhost/PW/Client/home.php?change=1&page=<?php echo $start-9; ?>"><button type="button" name="button" class="btn btn-outline-dark" id="previous">Para</button></a>
                <div class="space"></div>
                <a href="http://localhost/PW/Client/home.php?change=1&page=<?php echo $start; ?>"><button type="button" name="button" class="btn btn-outline-dark" id="next">Pas</button></a>
                <?php
              }
            ?>
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
