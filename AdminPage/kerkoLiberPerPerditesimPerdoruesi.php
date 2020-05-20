<?php

if(isset($_POST['submit'])){
  //tipi percakton ne qofte se rezultatet e kerimit do te vendosen poshte text box-it(qe do te shfaqe vete 4 rezultate)
  //apo do te vendosen brenda nje divi ku do te shfaqen te gjitha rezultatet e mundshme
  $type = $_POST['type'];
  $perdorues_id = $_POST["perdorues_id"];

  //behte lidhja me databasen
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  if (mysqli_connect_errno()) {
    echo "error";
    exit();
  }

  //kerkim i avancuar sipas titullit
  if(isset($_POST['titulli'])){
    //titulli qe do te jete kusht per kerkimin
    $titulli = $_POST['titulli'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriTitulli = "select liber_id, titulli, autori, zhaneri from LIBER where titulli like '%$titulli%' and zhaneri = '$zhaneri'";
      }else{
        $queriTitulli = "select liber_id, titulli, autori, zhaneri from LIBER where titulli like '%$titulli%'";
      }
    }else{
      $queriTitulli = "select liber_id, titulli, autori, zhaneri from LIBER where titulli like '%$titulli%'";
    }

    //ekzekutojme querine qe ben kerkimin sipas titullit
    $resultForTitulli = mysqli_query($connection, $queriTitulli);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 4; $i++){
        $rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH);
        if($rowForTitulli == NULL){
          break;
        }else {
          echo "<div id = 'libri'> ".$rowForTitulli['titulli']." "?><input type="submit" id="shtoLibrin" class="btn btn-success" value="+" data-liber_id="<?php echo $rowForTitulli['liber_id']; ?>" data-perdorues_id="<?php echo $perdorues_id; ?>" onclick="shtoLibrin(this)"></div><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati = 1;
      $triger = false;

      while(true){

        if($rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH)){

          if(!$triger){
            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

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
            echo "Shto";
            echo "</th>";

            echo "</tr>";
            $triger = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati;
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['titulli'];
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['autori'];
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['zhaneri'];
          echo "</td>";
          echo "<td>";
          echo "<input type='submit' id='shtoLibrin' class='btn btn-success' value='+' data-liber_id=".$rowForTitulli['liber_id']." data-perdorues_id=".$perdorues_id." onclick='shtoLibrin(this)'>";
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
  //kerkim i avancuar sipas autorit
  }else if(isset($_POST['autori'])){
    //autori qe do te jete kusht per kerkimin
    $autori = $_POST['autori'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriAutori = "select liber_id, titulli, autori, zhaneri from LIBER where autori like '%$autori%' and zhaneri = '$zhaneri'";
      }else{
        $queriAutori = "select liber_id, titulli, autori, zhaneri from LIBER where autori like '%$autori%'";
      }
    }else{
      $queriAutori = "select liber_id, titulli, autori, zhaneri from LIBER where autori like '%$autori%'";
    }
    //ekzekutojme querine qe ben kerkimin sipas autorit
    $resultForAutori = mysqli_query($connection, $queriAutori);
    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 4; $i++){
        $rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH);
        if($rowForAutori == NULL){
          break;
        }else {
          echo "<div id = 'libri'> ".$rowForAutori['titulli']." "?><input type="submit" id="shtoLibrin" class="btn btn-success" value="+" data-liber_id="<?php echo $rowForAutori['liber_id']; ?>" data-perdorues_id="<?php echo $perdorues_id; ?>" onclick="shtoLibrin(this)"></div><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati = 1;
      $triger = false;

      while(true){

        if($rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH)){

          if(!$triger){
            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

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
            echo "Shto";
            echo "</th>";

            echo "</tr>";
            $triger = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati;
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['titulli'];
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['autori'];
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['zhaneri'];
          echo "</td>";
          echo "<td>";
          echo "<input type='submit' id='shtoLibrin' class='btn btn-success' value='+' data-liber_id=".$rowForAutori['liber_id']." data-perdorues_id=".$perdorues_id." onclick='shtoLibrin(this)'>";
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
  }else{
    //mban te dhenen qe do te jete si kusht kerkimi
    $libri = $_POST['libri'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriLibri = "select liber_id, titulli, autori, zhaneri from LIBER where (titulli like '%$libri%' or autori like '%$libri%') and (zhaneri = '$zhaneri')";
      }else{
        $queriLibri = "select liber_id, titulli, autori, zhaneri from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
      }
    }else{
      $queriLibri = "select liber_id, titulli, autori, zhaneri from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
    }

    //ekzekutojme querine qe ben kerkimin sipas te dhenes se mare
    $resultForLibri = mysqli_query($connection, $queriLibri);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 4; $i++){
        $rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH);
        if($rowForLibri == NULL){
          break;
        }else {
          echo "<div id = 'libri'>".$rowForLibri['titulli']." "?><input type="submit" id="shtoLibrin" class="btn btn-success" value="+" data-liber_id="<?php echo $rowForLibri['liber_id']; ?>" data-perdorues_id="<?php echo $perdorues_id; ?>" onclick="shtoLibrin(this)"></div><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati = 1;
      $triger = false;

      while(true){

        if($rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH)){

          if(!$triger){
            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

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
            echo "Shto";
            echo "</th>";

            echo "</tr>";
            $triger = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati;
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['titulli'];
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['autori'];
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['zhaneri'];
          echo "</td>";
          echo "<td>";
          echo "<input type='submit' id='shtoLibrin' class='btn btn-success' value='+' data-liber_id=".$rowForLibri['liber_id']." data-perdorues_id=".$perdorues_id." onclick='shtoLibrin(this)'>";
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
  mysqli_close($connection);
}
 ?>
