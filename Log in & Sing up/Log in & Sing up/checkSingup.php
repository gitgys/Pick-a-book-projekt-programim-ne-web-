<?php

  if(isset($_POST['submit'])){

    //te dhenat
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mosha = $_POST['mosha'];
    $gjinia = $_POST['gjinia'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];

    //lidhja me databasen
    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $queryCheckUsername = "select username from PERDORUES where username = '$username'";
    $queryCheckEmail = "select email from PERDORUES where email = '$email'";

    $resultForUsername = mysqli_query($connection, $queryCheckUsername);
    $resultForEmail = mysqli_query($connection, $queryCheckEmail);

    $rowResultForUsername = mysqli_fetch_array($resultForUsername, MYSQLI_BOTH);
    $rowResultForEmail = mysqli_fetch_array($resultForEmail, MYSQLI_BOTH);

    if($rowResultForUsername == NULL){
      if($rowResultForEmail == NULL){
          $queryInsert = "insert into PERDORUES (emri, mbiemri, username, password, mosha, gjinia, email, adresa) values ('$emri', '$mbiemri', '$username', '$password', $mosha, '$gjinia', '$email', '$adresa');";
          mysqli_query($connection, $queryInsert);
          echo "success";
      }else{
        echo "email i zene";
      }
    }else{
      echo "username i zene";
    }
    mysqli_close($connection);
  }
 ?>
