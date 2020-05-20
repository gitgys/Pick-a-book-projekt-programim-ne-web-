<?php
if(isset($_POST['submit'])){

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

  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $queryCheck = "select * from PERDORUES where perdoruesId = '$perdoruesId'";
  $resultCheck = mysqli_query($connection, $queryCheck);
  $rowCheck = mysqli_fetch_array($resultCheck, MYSQLI_BOTH);

  //kontrollojme ne qoftese kredencialet jane te sakta
  if($rowCheck['perdoruesId'] != $perdoruesId){
    echo "error1";
  }else if($rowCheck['emri'] != $emri){
    echo "error2";
  }else if($rowCheck['mbiemri'] != $mbiemri){
    echo "error3";
  }else if($rowCheck['username'] != $username){
    echo "error4";
  }else if($rowCheck['password'] != $password){
    echo "error5";
  }else if($rowCheck['mosha'] != $mosha){
    echo "error6";
  }else if($rowCheck['gjinia'] != $gjinia){
    echo "error7";
  }else if($rowCheck['email'] != $email){
    echo "error8";
  }else if($rowCheck['adresa'] != $adresa){
    echo "error9";
  }else if($rowCheck['roli'] != $roli){
    echo "error10";
  }else{
    //fshirja e perdoruesit
    $queryDelete = "delete from PERDORUES where perdoruesId = '$perdoruesId'";
    if($result = mysqli_query($connection, $queryDelete) == true){
      echo "success";
    }else {
      echo "error";
    }
  }
  mysqli_close($connection);
}
 ?>
