<?php
  session_start();
  if(isset($_POST['submit']) && isset($_SESSION['username'])){
    $liber_id = $_POST['liber_id'];
    $username = $_SESSION['username'];

    $connection = mysqli_connect("localhost", "root", "", "Database1");
    $queryMerPerdoruesId = "select perdoruesId from PERDORUES where username = '$username';";
    $resultForMerPerdoruesId = mysqli_query($connection, $queryMerPerdoruesId);
    $rowResultForMerPerdoruesId = mysqli_fetch_array($resultForMerPerdoruesId, MYSQLI_BOTH);

    if($rowResultForMerPerdoruesId != null){
      $perdoruesId = $rowResultForMerPerdoruesId['perdoruesId'];
      $kohe_rezervimi = date("Y-m-d H:i:s");
      $kohe_heqje = date("Y-m-d H:i:s", strtotime("+ 1 hour"));

      $checkNumriIRezervimeve = "select count(*) from TE_REZERVUARA where perdoruesId = '$perdoruesId'";
      $resultForCheckNumriIRezervimeve = mysqli_query($connection, $checkNumriIRezervimeve);
      $rowResultForCheckNumriIRezervimeve = mysqli_fetch_array($resultForCheckNumriIRezervimeve, MYSQLI_BOTH);

      if($rowResultForCheckNumriIRezervimeve != null && $rowResultForCheckNumriIRezervimeve[0] < 10){

        $checkRezervim = "select count(*) from TE_REZERVUARA where perdoruesId = '$perdoruesId' and liber_id = '$liber_id'";
        $resultForCheckRezerivimi = mysqli_query($connection, $checkRezervim);
        $rowResultForCheckRezervimi = mysqli_fetch_array($resultForCheckRezerivimi, MYSQLI_BOTH);

        if($rowResultForCheckRezervimi != null && $rowResultForCheckRezervimi[0] == 1){
          $queryUpdateRezervim = "update TE_REZERVUARA set
          kohe_rezervimi = '$kohe_rezervimi',
          kohe_heqje = '$kohe_heqje'
          where perdoruesId = '$perdoruesId' and liber_id = '$liber_id'";
          $resultForUpdateRezervimi = mysqli_query($connection, $queryUpdateRezervim);
          if($resultForUpdateRezervimi){
            echo "success";
          }else {
            echo "error1";
          }

        }else if($rowResultForCheckRezervimi[0] == 0){

          $queryLiberSasia = "select sasia from LIBER where liber_id = '$liber_id'";
          $resultForLiberSasia = mysqli_query($connection, $queryLiberSasia);
          $rowResultForLiberSasia = mysqli_fetch_array($resultForLiberSasia, MYSQLI_BOTH);

          if($rowResultForLiberSasia != null && $rowResultForLiberSasia['sasia'] > 0){
            $queryUpdateSasia = "update LIBER set sasia = sasia - 1 where liber_id = '$liber_id';";
            $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);
            if($resultForUpdateSasia){
              $queryForRezervo = "insert into TE_REZERVUARA values('$perdoruesId', '$liber_id', '$kohe_rezervimi', '$kohe_heqje')";
              $resultForRezervo = mysqli_query($connection, $queryForRezervo);
              if($resultForRezervo){
                echo "success";
              }else {
                echo "error";
              }
            }else {
              echo "error";
            }
          }else {
            echo "Libri nuk eshte ne gjendje";
          }
        }
      }else {
        echo "Nuk mund te beni me shume se 10 rezervime";
      }










    }
    mysqli_close($connection);
  }
 ?>
