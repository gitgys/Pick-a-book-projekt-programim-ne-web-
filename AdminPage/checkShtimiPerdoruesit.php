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
          $resultInsert = mysqli_query($connection, $queryInsert);
          echo "success";

          if(isset($_FILES['file'])){
            $queryGetId = "select perdoruesId from PERDORUES where username = '$username'";
            $resultForGetId = mysqli_query($connection, $queryGetId);
            $rowResultForGetId = mysqli_fetch_array($resultForGetId, MYSQLI_BOTH);

            if($rowResultForGetId != null){
              $prefix = $rowResultForGetId['perdoruesId'];

              if(in_array($fileActualExt, $allowedExt)){
                if($fileError === 0){
                  $fileNewName = $prefix.".".$fileActualExt;
                  $fileDestination = 'usersImg/'.$fileNewName;
                  move_uploaded_file($fileTmpName, $fileDestination);
                  $queryInsertImg = "update PERDORUES set imazhi = '$fileNewName' where username = '$username'";
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
        echo "email i zene";
      }
    }else{
      echo "username i zene";
    }
    mysqli_close($connection);
  }else {
    echo "error";
  }
 ?>
