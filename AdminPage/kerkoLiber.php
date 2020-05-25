<?php

if(isset($_POST['submit'])){
  //tipi percakton ne qofte se rezultatet e kerimit do te vendosen poshte text box-it(qe do te shfaqe vete 5 rezultate)
  //apo do te vendosen brenda nje divi ku do te shfaqen te gjitha rezultatet e mundshme
  $type = $_POST['type'];

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
        $queriTitulli = "select * from LIBER where titulli like '%$titulli%' and zhaneri = '$zhaneri'";
      }else{
        $queriTitulli = "select * from LIBER where titulli like '%$titulli%'";
      }
    }else{
      $queriTitulli = "select * from LIBER where titulli like '%$titulli%'";
    }

    //ekzekutojme querine qe ben kerkimin sipas titullit
    $resultForTitulli = mysqli_query($connection, $queriTitulli);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH);
        if($rowForTitulli == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForTitulli['liber_id']."'>".$rowForTitulli['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati1 = 1;
      $triger1 = false;

      while(true){

        if($rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH)){

          if(!$triger1){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
            echo "</th>";

            echo "</tr>";
            $triger1 = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati1;
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['barcode'];
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
          echo $rowForTitulli['viti_i_publikimit'];
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['shtepia_botuese'];
          echo "</td>";
          echo "<td>";
          echo $rowForTitulli['sasia'];
          echo "</td>";
          echo "<td>";

          echo "<a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForTitulli['liber_id']."'> <button class='btn btn-success'>Modifiko ".$rowForTitulli['titulli']."</button></a>";
          echo "</td>";
          echo "</tr>";

          $resultati1++;


        }else{

          if(!$triger1){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
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
        $queriAutori = "select * from LIBER where autori like '%$autori%' and zhaneri = '$zhaneri'";
      }else{
        $queriAutori = "select * from LIBER where autori like '%$autori%'";
      }
    }else{
      $queriAutori = "select * from LIBER where autori like '%$autori%'";
    }
    //ekzekutojme querine qe ben kerkimin sipas autorit
    $resultForAutori = mysqli_query($connection, $queriAutori);
    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH);
        if($rowForAutori == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForAutori['liber_id']."'>".$rowForAutori['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati2 = 1;
      $triger2 = false;

      while(true){

        if($rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH)){

          if(!$triger2){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
            echo "</th>";

            echo "</tr>";
            $triger2 = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati2;
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['barcode'];
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
          echo $rowForAutori['viti_i_publikimit'];
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['shtepia_botuese'];
          echo "</td>";
          echo "<td>";
          echo $rowForAutori['sasia'];
          echo "</td>";
          echo "<td>";

          echo "<a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForAutori['liber_id']."'> <button class='btn btn-success'>Modifiko ".$rowForAutori['titulli']."</button></a>";
          echo "</td>";
          echo "</tr>";

          $resultati2++;

        }else{

          if(!$triger2){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
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
        $queriLibri = "select * from LIBER where (titulli like '%$libri%' or autori like '%$libri%') and (zhaneri = '$zhaneri')";
      }else{
        $queriLibri = "select * from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
      }
    }else{
      $queriLibri = "select * from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
    }

    //ekzekutojme querine qe ben kerkimin sipas te dhenes se mare
    $resultForLibri = mysqli_query($connection, $queriLibri);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH);
        if($rowForLibri == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForLibri['liber_id']."'>".$rowForLibri['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

      $resultati3 = 1;
      $triger3 = false;

      while(true){

        if($rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH)){

          if(!$triger3){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
            echo "</th>";

            echo "</tr>";
            $triger3 = true;
          }

          echo "<tr>";
          echo "<td>";
          echo $resultati3;
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['barcode'];
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
          echo $rowForLibri['viti_i_publikimit'];
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['shtepia_botuese'];
          echo "</td>";
          echo "<td>";
          echo $rowForLibri['sasia'];
          echo "</td>";
          echo "<td>";

          echo "<a href='http://localhost/PW/AdminPage/modifikoLiber.php?liber_id=".$rowForLibri['liber_id']."'> <button class='btn btn-success'>Modifiko ".$rowForLibri['titulli']."</button></a>";
          echo "</td>";
          echo "</tr>";

          $resultati3++;

        }else{

          if(!$triger3){

            echo "<table>";
            echo "<tr>";

            echo "<th>";
            echo "Resultati";
            echo "</th>";

            echo "<th>";
            echo "Barcodi";
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
            echo "Viti publikimit";
            echo "</th>";

            echo "<th>";
            echo "Shtepia botuese";
            echo "</th>";

            echo "<th>";
            echo "Sasia";
            echo "</th>";

            echo "<th>";
            echo "Modifiko Liber";
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
}
 ?>
