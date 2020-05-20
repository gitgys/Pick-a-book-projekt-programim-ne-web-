<?php

if(isset($_POST['perdorues'])){
  $perdorues = $_POST['perdorues'];
  $type = $_POST['type'];
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  if (mysqli_connect_errno()) {
    echo "error";
    exit();
  }

  $queriEmer = "select * from PERDORUES where emri like '$perdorues%'";
  $resultForEmer = mysqli_query($connection, $queriEmer);

  if($type == "searchBox"){
    for($i = 0; $i < 5; $i++){
      $rowForEmer = mysqli_fetch_array($resultForEmer, MYSQLI_BOTH);
      if($rowForEmer == NULL){
        break;
      }else if($rowForEmer['emri'] == "admin"){
        continue;
      }else {
        echo "<div id = 'perdorues1'> <a href='http://localhost/PW/AdminPage/modifikoPerdorues.php?perdoruesId=".$rowForEmer['perdoruesId']."'>".$rowForEmer['emri']."</a></div>"?><?php
      }
    }
  }else if($type == "searchButton"){
    $resultati = 1;
    $triger = false;

    while(true){

      if($rowForEmer = mysqli_fetch_array($resultForEmer, MYSQLI_BOTH)){

        if($rowForEmer['emri'] == "admin"){
          continue;
        }

        if(!$triger){
          echo "<table>";
          echo "<tr>";

          echo "<th>";
          echo "Resultati";
          echo "</th>";

          echo "<th>";
          echo "Emri";
          echo "</th>";

          echo "<th>";
          echo "Mbiemri";
          echo "</th>";

          echo "<th>";
          echo "Username";
          echo "</th>";

          echo "<th>";
          echo "Mosha";
          echo "</th>";

          echo "<th>";
          echo "Gjinia";
          echo "</th>";

          echo "<th>";
          echo "Emaili";
          echo "</th>";

          echo "<th>";
          echo "Modifiko perdorues";
          echo "</th>";

          echo "</tr>";
          $triger = true;
        }

        echo "<tr>";
        echo "<td>";
        echo $resultati;
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['emri'];
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['mbiemri'];
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['username'];
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['mosha'];
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['gjinia'];
        echo "</td>";
        echo "<td>";
        echo $rowForEmer['email'];
        echo "</td>";
        echo "<td>";
        echo "<a href='http://localhost/PW/AdminPage/modifikoPerdorues.php?perdoruesId=".$rowForEmer['perdoruesId']."'><button class='btn btn-success'>Modifiko ".$rowForEmer['emri']."</button></a>";
        echo "</td>";
        echo "</tr>";

        $resultati++;
      }else {
        if(!$triger){
          echo "<table>";
          echo "<tr>";

          echo "<th>";
          echo "Resultati";
          echo "</th>";

          echo "<th>";
          echo "Emri";
          echo "</th>";

          echo "<th>";
          echo "Mbiemri";
          echo "</th>";

          echo "<th>";
          echo "Username";
          echo "</th>";

          echo "<th>";
          echo "Mosha";
          echo "</th>";

          echo "<th>";
          echo "Gjinia";
          echo "</th>";

          echo "<th>";
          echo "Emaili";
          echo "</th>";

          echo "<th>";
          echo "Modifiko perdorues";
          echo "</th>";
          echo "</tr>";


          echo "<tr>";
          echo "<td>";
          echo "0";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "<td>";
          echo "no result";
          echo "</td>";
          echo "</tr>";

          echo "</table>";
        }
        break;
      }
    }
    echo "</table>";
  }else {
    echo "no results";
  }
}

 ?>
