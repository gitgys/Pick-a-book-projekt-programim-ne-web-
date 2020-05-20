<?php
  if(isset($_POST['submit'])){

    //te dhenat e librit qe kerkohet te fshihet
    session_start();
    $liber_id = $_SESSION['liber_id'];
    $barcode = $_POST['barcode'];
    $titulli = $_POST['titulli'];
    $autori = $_POST['autori'];
    $zhaneri = $_POST['zhaneri'];
    $vitiIPublikimit = $_POST['vitiIPublikimit'];
    $shtepiaBotuese = $_POST['shtepiaBotuese'];
    $sasia = $_POST['sasia'];
    $pershkrimi = $_POST['pershkrimi'];

    if($vitiIPublikimit == ""){
      $viti = "NULL";
    }else{
      $vitiTmp = explode("-", $vitiIPublikimit);
      $viti = $vitiTmp[0];
    }

    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $queryCheck = "select * from LIBER where liber_id = '$liber_id'";
    $resultCheck = mysqli_query($connection, $queryCheck);
    $rowCheck = mysqli_fetch_array($resultCheck, MYSQLI_BOTH);

    if($rowCheck['barcode'] != $barcode){
      echo "errorBarcode";
    }else if($rowCheck['titulli'] != $titulli){
      echo "errorTitulli";
    }else if($rowCheck['autori'] != $autori){
      echo "errorAutori";
    }else if($rowCheck['zhaneri'] != $zhaneri){
      echo "errorZhaneri";
    }else if($rowCheck['viti_i_publikimit'] != $viti){
      echo "errorViti";
    }else if($rowCheck['shtepia_botuese'] != $shtepiaBotuese){
      echo "errorShtepiaBotuese";
    }else if($rowCheck['sasia'] != $sasia){
      echo "errorSasia";
    }else if($rowCheck['pershkrimi'] != $pershkrimi){
      echo "errorPershkrimi";
    }else{
      //fshirja e librit
      $queryDelete = "delete from LIBER where liber_id = '$liber_id'";
      if($result = mysqli_query($connection, $queryDelete)){
        echo "success";
        unset($liber_id);
      }else {
        echo "error";
      }
    }
    mysqli_close($connection);
  }

 ?>
