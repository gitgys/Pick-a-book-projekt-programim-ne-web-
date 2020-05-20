<?php

  if(isset($_POST['submit'])){

    //username dhe email-i fillestare te perdoruesit
    session_start();
    $usernameFillestar = $_SESSION['usernameFillestar'];
    $emailFillestar = $_SESSION['emailFillestar'];

    //vlerat qe do te perditesohen
    $perdoruesId = $_POST['perdoruesId'];
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mosha = $_POST['mosha'];
    $gjinia = $_POST['gjinia'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $roli = $_POST['roli'];

    //lidhja me databasen
    $connection = mysqli_connect('localhost', 'root', '', 'Database1');

    //queri per te pare ne qofte se ka username ose email te njejte me ate qe kerkohet te vendoset
    $queryCheckUsername = "select count(*) from PERDORUES where username = '$username'";
    $queryCheckEmail = "select count(*) from PERDORUES where email = '$email'";
    //ekzekutimi i querive
    $resultForUsername = mysqli_query($connection, $queryCheckUsername);
    $resultForEmail = mysqli_query($connection, $queryCheckEmail);
    //marrja e resultatit nga queriet
    $rowResultForUsername = mysqli_fetch_array($resultForUsername, MYSQLI_BOTH);
    $rowResultForEmail = mysqli_fetch_array($resultForEmail, MYSQLI_BOTH);

    //kontrolli ne qofte se ka apo jo username apo email te njejte
    if($rowResultForUsername[0] == 0 || $rowResultForUsername == NULL || $usernameFillestar == $username){
      if($rowResultForEmail[0] == 0 || $rowResultForEmail == NULL || $emailFillestar == $email){
        //queri per perditesimin e perdoruesit
        $queryUpdate ="update PERDORUES set
                       emri = '$emri',
                       mbiemri = '$mbiemri',
                       username = '$username',
                       password = '$password',
                       mosha = '$mosha',
                       gjinia = '$gjinia',
                       email = '$email',
                       adresa = '$adresa',
                       roli = '$roli'
                       where perdoruesId = '$perdoruesId';";

        unset($usernameFillestar);
        unset($emailFillestar);
        //ekzekutimi i querise per updateimin e perdoruesit
        $result = mysqli_query($connection, $queryUpdate);
        if(!$result){
            echo "error";
        }else{
          echo "success";
        }
      }else{
        // echo $rowResultForUsername;
        echo "email i zene";
      }
    }else {
      // echo $rowResultForEmail[1]."<br>";
      echo "username i zene";
    }
    mysqli_close($connection);
  }
 ?>
