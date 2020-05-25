<?php
  session_start();
  if(isset($_POST['submit']) && $_SESSION['username']){
    $username = $_SESSION['username'];
    $liber_id = $_POST['liber_id'];

    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $queryMerPeroduesId = "select perdoruesId from PERDORUES where username = '$username';";
    $resultForMerPerdoruesId = mysqli_query($connection, $queryMerPeroduesId);
    $rowForMerPerdiruesId = mysqli_fetch_array($resultForMerPerdoruesId, MYSQLI_BOTH);

    if($rowForMerPerdiruesId != null){
      $perdoruesId = $rowForMerPerdiruesId['perdoruesId'];

      $queryHiqRezervim = "delete from TE_REZERVUARA where perdoruesId = '$perdoruesId' and liber_id = '$liber_id'";
      $resultForHiqRezervim = mysqli_query($connection, $queryHiqRezervim);
      if($resultForHiqRezervim){
        $queryUpdateSasia = "update LIBER set sasia = sasia + 1 where liber_id = '$liber_id';";
        $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);
        if($resultForUpdateSasia){
          echo "success";
        }else {
          echo "error";
        }
      }else {
        echo "error";
      }
    }else {
      echo "error";
    }
    mysqli_close($connection);
  }
 ?>
