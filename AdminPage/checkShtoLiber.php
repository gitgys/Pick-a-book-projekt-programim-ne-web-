<?php

  if(isset($_POST['submit'])){

    //te dhenat e ardhura nga post
    $barcode = $_POST['barcode'];
    $titulli = $_POST['titulli'];
    $autori = $_POST['autori'];
    $zhaneri = $_POST['zhaneri'];
    $vitiIPublikimit = $_POST['vitiIPublikimit'];
    $shtepiaBotuese = $_POST['shtepiaBotuese'];
    $sasia = $_POST['sasia'];
    $pershkrimi = $_POST['pershkrimi'];
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allow = array("jpg", "jpeg", "png");

    if(in_array($fileActualExt, $allow)){
      if($fileError === 0){
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = "libraImg/".$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
      }else{
        echo "error ne imazh";
      }
    }else{
      echo "format i gabuar";
    }


    if($vitiIPublikimit == ""){
      $viti = 'NULL';
    }else{
      $tmpViti = explode("-", $vitiIPublikimit);
      $viti = $tmpViti[0];
    }

    //lidhja me databasen
    $connection = mysqli_connect('localhost', 'root', '', 'Database1');

    //queri per te pare ne qofte se ka username ose email te njejte me ate qe kerkohet te vendoset
    $queryCheckTitullDheAutore = "select count(*) from LIBER where (barcode = $barcode) OR (titulli = '$titulli' AND autori = '$autori' AND viti_i_publikimit = $viti);";

    //ekzekutimi i queris
    $resultForTitullDheAutore = mysqli_query($connection, $queryCheckTitullDheAutore);
    //marrja e resultatit nga queria
    $rowResultForTitullDheAutore = mysqli_fetch_array($resultForTitullDheAutore, MYSQLI_BOTH);

    //kontrollojme ne qofte se ka libra te tjere me te njejtin barcode ose me te njejtin titull, autor apo vit publikimi
    //ne qofte se ky liber nuk gjendet atehere te dhenat e librit vendosen ne database
    //ne te kubdert behet updateimi i librit
    if($_POST['submit'] == 1){
      if($rowResultForTitullDheAutore == NULL || $rowResultForTitullDheAutore[0] == 0){
        $queryInsert = "insert into LIBER (barcode, titulli, autori, zhaneri, viti_i_publikimit, shtepia_botuese, sasia, pershkrimi, imazhi) values($barcode, '$titulli', '$autori', '$zhaneri', $viti, '$shtepiaBotuese', $sasia, '$pershkrimi', '$fileNameNew');";
        $resultForInsert = mysqli_query($connection, $queryInsert);
        if($resultForInsert == true){
          echo "success";
        }else{
          echo "error1";
        }
      }else if($rowResultForTitullDheAutore[0] > 0){
        echo "libriNdodhet";
      }
    }

    if($_POST['submit'] == 2){
      $queryUpdate = "update LIBER  set sasia = $sasia + sasia where titulli = '$titulli' AND autori = '$autori' AND viti_i_publikimit = $viti;";
      $resultForUpdate = mysqli_query($connection, $queryUpdate);
      if($resultForUpdate == true){
        echo "success";
      }else{
        echo "error2";
      }
    }
    mysqli_close($connection);
  }
 ?>
