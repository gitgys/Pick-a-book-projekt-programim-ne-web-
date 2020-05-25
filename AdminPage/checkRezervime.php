<?php
  if(isset($_POST['submit'])){

    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $queryCheckTeRezervuara = "select * from TE_REZERVUARA";
    $resultForCheckTeRezervuara = mysqli_query($connection, $queryCheckTeRezervuara);


    while($rowResultForCheckTeRezervuara = mysqli_fetch_array($resultForCheckTeRezervuara, MYSQLI_BOTH)){
      $time = date("Y-m-d H:i:s");
      $kohaERezervimit = $rowResultForCheckTeRezervuara['kohe_heqje'];
      $liber_id = $rowResultForCheckTeRezervuara['liber_id'];
      $perdoruesId = $rowResultForCheckTeRezervuara['perdoruesId'];
      if(strtotime($time) > strtotime($kohaERezervimit)){
        $queryHiqRezervim = "delete from TE_REZERVUARA where perdoruesId = '$perdoruesId' and liber_id = '$liber_id'";
        $resultForHiqRezervim = mysqli_query($connection, $queryHiqRezervim);
        if($resultForHiqRezervim){
          $queryUpdateSasia = "update LIBER set sasia = sasia + 1 where liber_id = '$liber_id';";
          $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);
          if($resultForUpdateSasia){
            echo "success";
            echo "+++";
            echo $perdoruesId;
            echo "+++";
            echo $liber_id;
          }
        }
      }
    }
    mysqli_close($connection);
  }
 ?>
