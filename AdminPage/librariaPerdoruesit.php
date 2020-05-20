<?php
if(!isset($_REQUEST['perdoruesId'])){
  header("location: http://localhost/PW/AdminPage/perditesoPerdorues.php");
}else{
  session_start();
  include_once("Style/headerAdmin.html");
  include_once("Style/backgroundAdmin.html");
  ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="perditesoPerdorues.js"></script>
    <link rel="stylesheet" href="Style/perditesoPerdorues.css">
  <?php

  $perdoruesId = $_REQUEST['perdoruesId'];

  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $queryLibrat = "select liber_id, titulli, autori, zhaneri
                  from LIBER
                  where liber_id in(
  	                  select liber_id
  	                  from TE_MARA
  	                  where perdoruesId = $perdoruesId)";
  $resultForLibrat = mysqli_query($connection, $queryLibrat);
  $rowForReslutLibrat = mysqli_fetch_array($resultForLibrat, MYSQLI_BOTH);

  ?>

  <div class="allClass">
    <div id="info" data-perdorues_id='<?php echo $perdoruesId; ?>' ></div>
    <div class="back">
      <a href="http://localhost/PW/AdminPage/perditesoPerdorues.php"><button type="button" class="btn btn-secondary" id="back">Back</button></a>
    </div>
    <div class="search">
      <div class="searchBox">
        <input type="text" name="searchBox" id="searchBox" placeholder="Kerko per liber" onkeyup="kerkoSearchBox()">
        <div id="liberSearchBox"></div>
      </div>
      <div class="searchButton">
        <div class="kerko">
          <input type="submit" class="btn btn-secondary" id="kerko" value="Kerko" onclick="kerkoSearchButton()">
        </div>
        <div class="kerkimIAvancuar">
          <input type="submit" class="btn btn-secondary" id="kerkimIAvancuar" value="Kerkim i avancuar" onclick="showKerkimIAvancuar()">
          <div class="kerkimIAvancuarDiv"></div>
        </div>
      </div>
    </div>

    <div id="librat">
    <?php
    echo "<table id='tabela1'>";
    echo "<tr>";
    echo "<th>";
    echo "Titulli";
    echo "</th>";
    echo "<th>";
    echo "Autori";
    echo "</th>";
    echo "<th>";
    echo "Zhaneri";
    echo "</th>";
    echo "<th>";
    echo "Hiq";
    echo "</th>";
    echo "</tr>";
    while($rowForReslutLibrat){
      echo "<tr>";
      $liber_id = $rowForReslutLibrat["liber_id"];
      $content = "<div id='$liber_id'>
      <td>".$rowForReslutLibrat["titulli"]."</td>
      <td>".$rowForReslutLibrat["autori"]."</td>
      <td>".$rowForReslutLibrat["zhaneri"]."</td>
      <td><input type='submit' value='-' onclick='hiqLiber(this)' class='btn btn-danger' data-perdorues_id='$perdoruesId' data-liber_id='$liber_id'></td>
      </div><br>";
      echo $content;
      echo "</tr>";
      $rowForReslutLibrat = mysqli_fetch_array($resultForLibrat, MYSQLI_BOTH);
    }
    echo "</table>";
    ?>
      <div id="liberSearchButton"></div>
    </div>

  </div>
  <?php
}
 ?>
