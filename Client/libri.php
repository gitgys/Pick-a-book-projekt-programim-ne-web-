<?php
session_start();
  if(isset($_REQUEST['liber_id'])){
      $liber_id = $_REQUEST['liber_id'];

      $connection = mysqli_connect('localhost', 'root', '', 'Database1');

      //queri per te pare ne qofte se ka username ose email te njejte me ate qe kerkohet te vendoset
      $queryMerLiber = "select * from LIBER where liber_id = '$liber_id';";
      $resultForMerLiber = mysqli_query($connection, $queryMerLiber);
      $rowResultForMerLiber = mysqli_fetch_array($resultForMerLiber, MYSQLI_BOTH);

      $username = $_SESSION['username'];
      $getImage = "select imazhi from PERDORUES where username = '$username'";
      $resultForGetImage = mysqli_query($connection, $getImage);
      $rowResult = mysqli_fetch_array($resultForGetImage, MYSQLI_BOTH);

      if($rowResult != null){
        $imazhi = $rowResult['imazhi'];
      }
      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <title>Liber</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script type="text/javascript" src="http://localhost/PW/Client/clientScript.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <link rel="stylesheet" href="Style/libri.css">

          <style media="screen">
          .header{
            display: block;
            margin-left: 80px;
            margin-right: 80px;
            margin-top: 20px;
          }


          .mainFunctions{
              display: block;
              margin-bottom: 20px; 
          }

          .profili{
            display: inline-block;
            width: 100px;
            margin: 0 auto;
          }

          #profili{
            margin-left: 80px;
          }

          .logo{
            display: inline-block;
            margin-top: 0px;
            margin-left: 33%;
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
        </head>
        <body>
          <div class="all">
          <?php
          if($rowResultForMerLiber != null){
            $liber_id = $rowResultForMerLiber['liber_id'];
            $titulli = $rowResultForMerLiber['titulli'];
            $autori = $rowResultForMerLiber['autori'];
            $zhaneri = $rowResultForMerLiber['zhaneri'];
            $vitiIPublikimit = $rowResultForMerLiber['viti_i_publikimit'];
            $shtepiaBotuese = $rowResultForMerLiber['shtepia_botuese'];
            $sasia = $rowResultForMerLiber['sasia'];
            $pershkrimi = $rowResultForMerLiber['pershkrimi'];
            $image = $rowResultForMerLiber['imazhi'];
            ?>

            <div class="header">
              <div class="profili">
                <a href="http://localhost/PW/Client/profili.php"><img src="http://localhost/PW/AdminPage/usersImg/<?php echo $imazhi; ?> " id="profil" alt="perdorues"></a>
                <p>
                <?php echo $username; ?>
               </p>
              </div>
              <div class="logo">
                <img src="http://localhost/PW/AdminPage/Style/logo.png" style="width: 200px; height:100px;" alt="logo" class="logoImgClass">
              </div>
              <div class="logout">
                <a href="http://localhost/PW/Client/logout.php"> <button type="button" name="logout" class="btn btn-danger" id="logout">Logout</button></a>
              </div>
              <div class="mainFunctions">
                <a href="home.php"><button type="button" name="home" class="btn btn-secondary" id="home">Home</button></a>
                <a href="profili.php"><button type="button" name="profili" class="btn btn-secondary" id="prf">Profili</button></a>
              </div>
            </div>

              <div class="imazhi">
                <?php echo "<img src='http://localhost/PW/AdminPage/libraImg/".$image."' alt='Liber'>"; ?>
              </div>
              <div class="general">
                <div id="titulli">
                 <pre>Titulli: </pre> <pre id="content"><?php echo $titulli; ?></pre>
                </div>
                <div id="autori">
                  <pre>Autori: </pre> <pre id="content"><?php echo $autori; ?></pre>
                </div>
                <div id="zhaneri">
                  <pre>Zhaneri: </pre> <pre id="content"><?php echo $zhaneri; ?></pre>
                </div>
                <div id="sasia">
                  <pre>Sasia: </pre> <pre id="content"><?php echo $sasia; ?></pre>
                </div>
                <div id="shtepiaBotuese">
                  <pre>Shtepia botuese: </pre> <pre id="content"><?php echo $shtepiaBotuese; ?></pre>
                </div>
                <div id="vitiIPublikimit">
                  <pre>Viti i publikimit: </pre> <pre id="content"><?php echo $vitiIPublikimit; ?></pre>
                </div>
                <div id="rezervo">
                  <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $liber_id; ?>">
                  <button type="button" name="button" class="btn btn-outline-success" onclick="rezervo(this)" data-liber_id="<?php echo $liber_id; ?>">Rezervo</button>
                  </a>
                </div>
              </div>
            </div>

           <div id="pershkrimi">
             <?php echo $pershkrimi; ?>
           </div>
           <?php
         }
         ?>
        </body>
      </html>
      <?php

  }else {
    header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
  }
 ?>
