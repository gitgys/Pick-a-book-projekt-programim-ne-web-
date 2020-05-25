<?php

  if(isset($_REQUEST['submit'])){

    //te dhenat e ardhura nga post
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
        $queryInsert = "insert into LIBER (barcode, titulli, autori, zhaneri, viti_i_publikimit, shtepia_botuese, sasia, pershkrimi) values($barcode, '$titulli', '$autori', '$zhaneri', $viti, '$shtepiaBotuese', $sasia, '$pershkrimi');";
        $resultForInsert = mysqli_query($connection, $queryInsert);
        if($resultForInsert == true){
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

        }else{
          echo "error1";
        }
      }else if($rowResultForTitullDheAutore[0] > 0){
        echo "libriNdodhet";
      }
    }

    mysqli_close($connection);
  }else {
    echo "error";
  }
 ?>
