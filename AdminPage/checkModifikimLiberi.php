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


    if(isset($_FILES['file'])){
      $file = $_FILES['file'];
      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      $fileExt = explode(".", $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowedExt = array('jpg', 'jpeg', 'png');
    }


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

        if(isset($_FILES['file'])){
          $queryGetId = "select liber_id from LIBER where titulli = '$titulli' and autori = '$autori' and viti_i_publikimit = $viti";
          $resultForGetId = mysqli_query($connection, $queryGetId);
          $rowResultForGetId = mysqli_fetch_array($resultForGetId, MYSQLI_BOTH);

          if($rowResultForGetId != null){
            $prefix = $rowResultForGetId['liber_id'];

            if(in_array($fileActualExt, $allowedExt)){
              if($fileError === 0){
                $fileNewName = $prefix.".".$fileActualExt;
                $fileDestination = 'libraImg/'.$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $queryInsertImg = "update LIBER set imazhi = '$fileNewName' where titulli = '$titulli' and autori = '$autori' and viti_i_publikimit = '$viti'";
                mysqli_query($connection, $queryInsertImg);
              }else {
                echo "error1";
              }
            }else {
              echo "tip i palejuar i imazhit";
            }
          }else {
            echo "error2";
          }
        }




      }

    }else{
      echo "barcode i zene";
    }
    mysqli_close($connection);
  }else {
    echo "2";
  }

 ?>
