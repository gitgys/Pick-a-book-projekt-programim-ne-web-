<?php

  if(isset($_POST['submit'])){

    //barcode fillestare i librit
    session_start();
    $barcodeFillestare = $_SESSION['barcode'];

    //te dhenat qe do te perditesohen
    $barcode = $_POST['barcode'];
    $titulli = $_POST['titulli'];
    $autori = $_POST['autori'];
    $zhaneri = $_POST['zhaneri'];
    $vitiIPublikimit = $_POST['vitiIPublikimit'];
    $shtepiaBotuese = $_POST['shtepiaBotuese'];
    $sasia = $_POST['sasia'];
    $pershkrimi = $_POST['pershkrimi'];

    if($vitiIPublikimit == ""){
      $viti = 'NULL';
    }else{
      $tmpViti = explode("-", $vitiIPublikimit);
      $viti = $tmpViti[0];
    }

    //lidhja me databasen
    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    //queri per te pare ne qofte se ndodhen libra te tjere me te njejtin barcode
    $queryCheckBarcode = "select count(*) from LIBER where barcode = $barcode";
    //ekzekutimi i querise
    $resultForCheckBarcode = mysqli_query($connection, $queryCheckBarcode);
    //marrja e rezultatit nga queria
    $rowResultForBarcode = mysqli_fetch_array($resultForCheckBarcode, MYSQLI_BOTH);

    if($rowResultForBarcode == NULL || $rowResultForBarcode[0] == 0 || $barcode == $barcodeFillestare){
      //queri per perditesimin e librit
      $queryUpdate = "update LIBER set
                      barcode = $barcode,
                      titulli = '$titulli',
                      autori = '$autori',
                      zhaneri = '$zhaneri',
                      viti_i_publikimit = $viti,
                      shtepia_botuese = '$shtepiaBotuese',
                      sasia = $sasia,
                      pershkrimi = '$pershkrimi'
                      where barcode = $barcode;";

      // unset($barcodeFillestare);
      $result = mysqli_query($connection, $queryUpdate);
      if(!$result){
        echo "error";
      }else{
        echo "success";
      }

    }else{
      echo "barcode i zene";
    }
    mysqli_close($connection);
  }

 ?>
