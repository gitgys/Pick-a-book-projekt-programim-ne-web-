<?php
  if(!isset($_POST["submit"])){
    header("location: http://localhost/PW/AdminPage/perditesoPerdorues.php");
  }else{
    //id e perdoruesit qe po mer librin dhe id e librit qe do ti jepet perdoruesit
    $perdorues_id = $_POST["perodrues_id"];
    $liber_id = $_POST["liber_id"];

    //lidhja me databasen
    $connection = mysqli_connect("localhost", "root", "", "Database1");
    $queriCheckRezervimi = "select count(*) from TE_REZERVUARA where perdoruesId = '$perdorues_id' and liber_id = '$liber_id';";
    $resultForCheckRezervimi = mysqli_query($connection, $queriCheckRezervimi);
    $rowResultForCheckRezervimi = mysqli_fetch_array($resultForCheckRezervimi, MYSQLI_BOTH);

    //shohim ne qofte se libri eshte rezervuar me pare
    //ne qofte se eshte rezervuar atehere e heqim nga rezervimet
    //perpara se ta shtojme tek librat e mare
    if($rowResultForCheckRezervimi != null && $rowResultForCheckRezervimi[0] == 1){

      $queryHiqNgaRezervimi = "delete from TE_REZERVUARA where perdoruesId = '$perdorues_id' and liber_id = '$liber_id';";
      $resuktForHiqNgaRezervimi = mysqli_query($connection, $queryHiqNgaRezervimi);

      if(!$resuktForHiqNgaRezervimi){
        echo "nuk u hoq nga rezervimi";
      }
    }


    //shohim ne qofte se libri eshte paraprakisht i mare nga perdoruesi
    $queryCheckTeMara = "select count(*) from TE_MARA where perdoruesId = '$perdorues_id' and liber_id = '$liber_id'";
    $resultForCheckTeMara = mysqli_query($connection, $queryCheckTeMara);
    $rowResultForCheckTeMara = mysqli_fetch_array($resultForCheckTeMara, MYSQLI_BOTH);


    //shohim ne qofte se ka libra ne gjendje per tu mare
    //pra ne qofte se sasia eshte me e madhe se 0
    $queryCheckSasia = "select sasia from LIBER where liber_id = '$liber_id'";
    $resultForCheckSasia = mysqli_query($connection, $queryCheckSasia);
    $rowResultForCheckSasia = mysqli_fetch_array($resultForCheckSasia, MYSQLI_BOTH);


    $checkNumriILibraveTeMare = "select count(*) from TE_MARA where perdoruesId = '$perdorues_id'";
    $resultForCheckNumriILibraveTeMare = mysqli_query($connection, $checkNumriILibraveTeMare);
    $rowResultForCheckNumriILibraveTeMare = mysqli_fetch_array($resultForCheckNumriILibraveTeMare, MYSQLI_BOTH);



    if($rowResultForCheckSasia != null && $rowResultForCheckSasia[0] > 0){

        if($rowResultForCheckTeMara == NULL || $rowResultForCheckTeMara[0] == 0){

          if($rowResultForCheckNumriILibraveTeMare != null && $rowResultForCheckNumriILibraveTeMare[0] < 10){

            //data e marjes dhe e dorezimit te librit
            $dateMarje = date("Y-m-d");
            $dateDorezimi = date("Y-m-d", strtotime($dateMarje. "+ 30 days"));

            //shtimi i librit ne tabelen te mara
            $queryShtoTeTeMara = "insert into TE_MARA values($perdorues_id, $liber_id, '$dateMarje', '$dateDorezimi');";
            $resultForShtoTeMara = mysqli_query($connection, $queryShtoTeTeMara);

            //ul numrin e librave ne biblioteke me 1
            $queryUpdateSasia = "update LIBER set sasia = sasia - 1 where liber_id = '$liber_id';";
            $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);

            if($resultForShtoTeMara){
              $queryGetInfoMbiLibrin = "select titulli, autori, zhaneri from LIBER where liber_id = '$liber_id';";
              $resultForGetInfoMbiLibrin = mysqli_query($connection, $queryGetInfoMbiLibrin);
              $rowResultForGetInfoMbiLibrin = mysqli_fetch_array($resultForGetInfoMbiLibrin, MYSQLI_BOTH);
              if($rowResultForGetInfoMbiLibrin != null){
                echo "success"."++++".$rowResultForGetInfoMbiLibrin['titulli']."++++".$rowResultForGetInfoMbiLibrin['autori']."++++".$rowResultForGetInfoMbiLibrin['zhaneri'];
              }else{
                echo "error";
              }
            }else{
              echo "nuk u shtua";
            }

          }else {
            echo "Nuk mund te merni me shume se 10 libra";
          }

        }else {
          echo "libri ndodhet";
        }
      }else {
        echo "Libri nuk eshte ne gjendje";
      }

    }
 ?>
