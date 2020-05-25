<?php
if(isset($_POST['perdorues_id']) && isset($_POST['liber_id'])){
  $perdorues_id = $_POST['perdorues_id'];
  $liber_id = $_POST['liber_id'];

  $connection = mysqli_connect("localhost", "root", "", "Database1");
  $queryHiqLiber = "delete from TE_MARA where perdoruesId = '$perdorues_id' and liber_id = '$liber_id'";
  $resultFromHiqLiber = mysqli_query($connection, $queryHiqLiber);

  if($resultFromHiqLiber){
    //ul numrin e librave ne biblioteke me 1
    $queryUpdateSasia = "update LIBER set sasia = sasia + 1 where liber_id = '$liber_id';";
    $resultForUpdateSasia = mysqli_query($connection, $queryUpdateSasia);
    echo "success";
  }else {
    echo "error";
  }
  mysqli_close($connection);
}
 ?>
