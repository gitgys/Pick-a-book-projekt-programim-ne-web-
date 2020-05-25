<?php
  session_start();
  if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Profili</title>
      <style media="screen">
      h3, h4{
        display: inline;
      }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript" src="http://localhost/PW/Client/clientScript.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="Style/profili.css">
    </head>
    <body onload="hiqRezervimeTimeOut()">
    <?php

    $username = $_SESSION["username"];

    $connection = mysqli_connect("localhost", "root", "", "Database1");
    //marrja e te dhenave te perdoruesit
    $queryInfo = "select * from PERDORUES where username = '$username';";
    $resultForInfo = mysqli_query($connection, $queryInfo);
    $rowResultForInfo = mysqli_fetch_array($resultForInfo, MYSQLI_BOTH);


    //mer informacion mbi klientin
    if($rowResultForInfo != null){
      $perdoruesId = $rowResultForInfo['perdoruesId'];
      $emri = $rowResultForInfo['emri'];
      $mbiemri = $rowResultForInfo['mbiemri'];
      $mosha = $rowResultForInfo['mosha'];
      $gjinia = $rowResultForInfo['gjinia'];
      $email = $rowResultForInfo['email'];
      $adresa = $rowResultForInfo['adresa'];

      if($gjinia == "m"){
        $gjinia = "Mashkull";
      }else if($gjinia == "f") {
        $gjinia = "Femer";
      }else {
        $gjinia = "Tjeter";
      }

    }else{
      echo "Gabim ne marrjen e te dhenave";
    }


    ?>
      <div class="all">
        <h2 id ="profili">Profili</h2>
        <?php
        include_once("Style/header.php");
        ?>

        <div class="teDhenat">
          <div class="username">
            <h3>Username: </h3> <h4><?php echo $username; ?> </h4>
          </div>
          <div class="emri">
            <h3>Emri: </h3> <h4><?php echo ucfirst($emri); ?> </h4>
          </div>
          <div class="mbiemri">
            <h3>Mbiemri: </h3> <h4><?php echo ucfirst($mbiemri); ?> </h4>
          </div>
          <div class="mosha">
            <h3>Mosha: </h3> <h4><?php echo $mosha; ?> </h4>
          </div>
          <div class="gjinia">
            <h3>Gjinia: </h3> <h4><?php echo $gjinia; ?> </h4>
          </div>
          <div class="email">
            <h3>Email: </h3> <h4><?php echo $email; ?> </h4>
          </div>
          <div class="adresa">
            <h3>Adresa: </h3> <h4><?php echo ucfirst($adresa); ?> </h4>
          </div>
          <div class="modifiko">
            <a href="modifiko.php"> <button type="button" name="modifiko" class="btn btn-warning" id="modifiko">Modifkio te dhenat</button></a>
          </div>
        </div>
    <?php


    //marrim cdo liber qe ka perdoruesi
    $queryInfoLibrat = "select * from TE_MARA where perdoruesId = '$perdoruesId';";
    $resultForInfoLibrat = mysqli_query($connection, $queryInfoLibrat);
    $rowResultForInfoLibrat = mysqli_fetch_array($resultForInfoLibrat, MYSQLI_BOTH);

    if($rowResultForInfoLibrat != null){
      ?>
      <div class="divTabelaLibrat">
        <h2>Libra te mare</h2>
      <table class="tabelaLibrat">
        <tr>
          <th>Titulli</th>
          <th>Autori</th>
          <th>Zhaneri</th>
          <th>Date marje</th>
          <th>Date dorezimi</th>
        </tr>
      <?php
      while($rowResultForInfoLibrat){

        $liberId = $rowResultForInfoLibrat['liber_id'];

        //per cdo liber te mare marim te dhenat kryesore
        $queryInfoLiber = "select * from LIBER where liber_id = $liberId;";
        $resultForInfoLiber = mysqli_query($connection, $queryInfoLiber);
        $rowResultForInfoLiber = mysqli_fetch_array($resultForInfoLiber, MYSQLI_BOTH);

        if($rowResultForInfoLiber != null){
          ?>
            <tr>
              <td><?php echo $rowResultForInfoLiber['titulli']; ?></td>
              <td><?php echo $rowResultForInfoLiber['autori']; ?></td>
              <td><?php echo $rowResultForInfoLiber['zhaneri']; ?></td>
              <td><?php echo $rowResultForInfoLibrat['date_marje']; ?></td>
              <td><?php echo $rowResultForInfoLibrat['date_dorezimi']; ?></td>
            </tr>
          <?php
        }
        $rowResultForInfoLibrat = mysqli_fetch_array($resultForInfoLibrat, MYSQLI_BOTH);
      }

      ?>
      </table>
      </div>
      <?php

    }else{
      ?>
      <div class="divTabelaLibrat">
        <h2>Libra te mare</h2>
      <table class="tabelaLibrat">
        <tr>
          <th>Titulli</th>
          <th>Autori</th>
          <th>Zhaneri</th>
          <th>Date marje</th>
          <th>Date dorezimi</th>
        </tr>
        <tr>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
        </tr>
        </table>
      </div>
      <?php
    }




    //mer informacion mbi librat e rezervuar
    $queryInfoPerRezervim = "select * from TE_REZERVUARA where perdoruesId ='$perdoruesId'";
    $resultForInfoPerRezervim = mysqli_query($connection, $queryInfoPerRezervim);
    $rowResultForInfoRezervimi = mysqli_fetch_array($resultForInfoPerRezervim, MYSQLI_BOTH);

    if($rowResultForInfoRezervimi != null){
      ?>
      <div class="divTabelaRezervime">
        <h2>Libra te rezervuar</h2>
      <table class="tabelaRezervime">
        <tr>
          <th>Titulli</th>
          <th>Autori</th>
          <th>Zhaneri</th>
          <th>Ore rezervimi</th>
          <th>Hiq nga rezervimi</th>
        </tr>
        <?php
          while ($rowResultForInfoRezervimi) {

            $liber_id = $rowResultForInfoRezervimi['liber_id'];

            //per cdo liber te mare marim te dhenat kryesore
            $queryInfoLiberTeRezervuar = "select * from LIBER where liber_id = $liber_id;";
            $resultForInfoLiberTeRezervuar = mysqli_query($connection, $queryInfoLiberTeRezervuar);
            $rowResultForInfoLiberTeRezervuar = mysqli_fetch_array($resultForInfoLiberTeRezervuar, MYSQLI_BOTH);

            if($rowResultForInfoLiberTeRezervuar != null){
              $time = explode(" ", $rowResultForInfoRezervimi['kohe_rezervimi']);
              $ora = $time[1];

              ?>
                <tr id="<?php echo $liber_id; ?>">
                  <td><?php echo $rowResultForInfoLiberTeRezervuar['titulli']; ?></td>
                  <td><?php echo $rowResultForInfoLiberTeRezervuar['autori']; ?></td>
                  <td><?php echo $rowResultForInfoLiberTeRezervuar['zhaneri']; ?></td>
                  <td><?php echo $ora; ?></td>
                  <td> <button type="button" name="button" class="btn btn-danger" data-liber_id="<?php echo $liber_id; ?>" onclick="hiqRezervim(this)">HIQ</button> </td>
                </tr>
              <?php
            }
            $rowResultForInfoRezervimi = mysqli_fetch_array($resultForInfoPerRezervim, MYSQLI_BOTH);
          }
         ?>
       </table>
       </div>
         <?php
    }else {
      ?>
      <div class="divTabelaRezervime">
        <h2>Libra te rezervuar</h2>
      <table class="tabelaRezervime">
        <tr>
          <th>Titulli</th>
          <th>Autori</th>
          <th>Zhaneri</th>
          <th>Ore rezervimi</th>
          <th>Hiq nga rezervimi</th>
        </tr>
        <tr>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
          <td>no result</td>
        </tr>
        </table>
      </div>
      <?php
    }
    ?>
        </div>
      </body>
      </html>

    <?php
  }else{
    header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
  }
 ?>
