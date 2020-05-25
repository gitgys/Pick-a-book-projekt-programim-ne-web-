<?php
  session_start();
  if(isset($_POST['submit']) && isset($_SESSION['username'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];

    $connection = mysqli_connect('localhost', 'root', '', 'Database1');

    $queryMerPerdoruesId = "select perdoruesId from PERDORUES where username = '$username';";
    $resultForMerPerdoruesId = mysqli_query($connection, $queryMerPerdoruesId);
    $rowResultForMerPerdoruesId = mysqli_fetch_array($resultForMerPerdoruesId, MYSQLI_BOTH);

    if($rowResultForMerPerdoruesId != null){
      $perdoruesId = $rowResultForMerPerdoruesId['perdoruesId'];

      $queryCheckRezervime = "select * from TE_REZERVUARA where perdoruesId = '$perdoruesId'";
      $resultForCheckRezervime = mysqli_query($connection, $queryCheckRezervime);
      $rowResultForCheckRezevime = mysqli_fetch_array($resultForCheckRezervime, MYSQLI_BOTH);

      if($rowResultForCheckRezevime != null){
        while($rowResultForCheckRezevime){
          $kohe_heqje = $rowResultForCheckRezevime['kohe_heqje'];
          if(strtotime($time)>strtotime($kohe_heqje)){
            $liber_id = $rowResultForCheckRezevime['liber_id'];
            $queryHiqRezervim = "delete from TE_REZERVUARA where perdoruesId = '$perdoruesId' and liber_id = '$liber_id'";
            $resultForHiqRezervim = mysqli_query($connection, $queryHiqRezervim);

            if($resultForHiqRezervim){
              $queryUpdateSasia = "update LIBER set sasia = sasia + 1 where liber_id = '$liber_id';";
              $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);
              if($resultForUpdateSasia){
                echo "success";
                echo ":";
                echo $liber_id;
              }else {
                echo "error";
              }
            }else {
              echo "error";
            }
          }
          $rowResultForCheckRezevime = mysqli_fetch_array($resultForCheckRezervime, MYSQLI_BOTH);
        }
      }else {
        echo "no result";
      }
    }else {
      echo "error";
    }
    mysqli_close($connection);
  }
 ?>
