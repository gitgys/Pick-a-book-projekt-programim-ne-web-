<?php
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $queryCheck = "select username, password, roli from PERDORUES where username = '$username' and password = '$password'";
    $resultsForCheck = mysqli_query($connection, $queryCheck);
    $rowForCheck = mysqli_fetch_array($resultsForCheck, MYSQLI_BOTH);

    if($rowForCheck[0] != NULL || $rowForCheck[1] != NULL){
      if($rowForCheck[2] == 0){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        echo "success client";
      }else if($rowForCheck[2] == 1){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        echo "success admin";
      }else{
        echo "error";
      }
      mysqli_close($connection);
    }else {
      mysqli_close($connection);
    }
  }
 ?>
