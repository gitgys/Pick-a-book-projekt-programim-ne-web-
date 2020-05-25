<?php
  $username = $_SESSION['username'];
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $getImage = "select imazhi from PERDORUES where username = '$username'";
  $resultForGetImage = mysqli_query($connection, $getImage);
  $rowResult = mysqli_fetch_array($resultForGetImage, MYSQLI_BOTH);

  if($rowResult != null){
    $imazhi = $rowResult['imazhi'];
  }

 ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style media="screen">
  .header{
    display: block;
    margin-left: 80px;
    margin-right: 80px;
    margin-top: 20px;
  }

  .profili{
    display: inline-block;
    width: 33%;
    margin: 0 auto;
  }

  #profili{
    margin-left: 80px;
    width: 100px;
  }

  .logoImgClass{
    width: 100%;
    display: inline-block;
    height: 100%;
  }

  .logo{
    display: inline-block;
    width: 33%;
    margin: 0 auto;
    text-align: center;
  }

  .logout{
    display: inline-block;
    width: 33%;
    float: right;
    margin: 0 auto;
  }

  #logout{
    float: right;
  }

  p{
  margin-left: 12px;
  }

</style>



<div class="header">
  <div class="profili">
    <a href="http://localhost/PW/Client/profili.php"><img src="http://localhost/PW/AdminPage/usersImg/<?php echo $imazhi; ?> " style="width:100px; height:100px;" id="profil" alt="perdorues"></a>
    <p> <?php echo $username; ?> </p>
  </div>
  <div class="logo">
    <img src="http://localhost/PW/AdminPage/Style/logo.png" style="width: 200px; height:100px;" alt="logo" class="logoImgClass">
  </div>
  <div class="logout">
    <a href="http://localhost/PW/Client/logout.php"> <button type="button" name="logout" class="btn btn-danger" id="logout">Logout</button></a>
  </div>
  <a href="home.php"><button type="button" name="home" class="btn btn-secondary" id="home">Home</button></a>
  <a href="profili.php"><button type="button" name="profili" class="btn btn-secondary" id="prf">Profili</button></a>
</div>
