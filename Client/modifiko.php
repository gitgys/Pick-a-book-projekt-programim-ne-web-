<?php
  session_start();
  if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
    $username = $_SESSION["username"];
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <title>Modifkio te dhenat</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost/PW/Client/clientScript.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style media="screen">
          #all{
              width: 400px;
              margin: 0 auto;
          }
        </style>
      </head>
      <body>
        <div class="all">

          <?php
            $connection = mysqli_connect('localhost', 'root', '', 'Database1');
            $query = "select * from PERDORUES where username = '$username';";
            $results = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($results, MYSQLI_BOTH);

            if($row != null){
              $emri = $row['emri'];
              $mbiemri = $row['mbiemri'];
              $username = $row['username'];
              $password = $row['password'];
              $mosha = $row['mosha'];
              $gjinia = $row['gjinia'];
              $email = $row['email'];
              $adresa = $row['adresa'];
              $_SESSION['usernameFillestar'] = $username;
              $_SESSION['emailFillestar'] = $email;
            }else {
              echo "Lidhja me databasen nuk u arrit";
            }
          ?>

          <div id="all">
            <h3>Modifiko</h3>
            <div id="emeriDiv">
              Emri <input type="text" class="form-control" name="emri" id="emri" placeholder="Emri" value="<?php echo $emri ?>">
              <div id="infoEmri"></div>
            </div>
            <div id="mbiemriDiv">
              Mbiemri <input type="text" class="form-control" name="mbiemri" id="mbiemri" placeholder="Mbiemri" value="<?php echo $mbiemri ?>">
              <div id="infoMbiemri"></div>
            </div>
            <div id="usernameDiv">
              Username <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username ?>">
              <div id="infoUsername"></div>
            </div>
            <div id="passwordDiv">
              Password <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password ?>">
              <div id="infoPassword"></div>
            </div>
            <div id="confirmPasswordDiv">
              Confirm password <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" value="<?php echo $password ?>">
              <div id="infoConfirmPassword"></div>
            </div>
            <div id="moshaDiv">
              Mosha <input type="number" min="7" max="120" class="form-control" name="mosha" id="mosha" placeholder="Mosha" value="<?php echo $mosha ?>">
              <div id="infoMosha"></div>
            </div>
            <div id="gjiniaDiv">
              Gjinia:
              <?php
                if($gjinia == 'm'){
                  ?>
                  <input type="radio" name="gjinia" id="mashkull" checked>
                  <label for="mashkull">Mashkull</label>
                  <input type="radio" name="gjinia" id="femer">
                  <label for="femer">Femer</label>
                  <input type="radio" name="gjinia" id="other">
                  <label for="other">Other</label>
                  <?php
                }else if($gjinia == 'f'){
                  ?>
                  <input type="radio" name="gjinia" id="mashkull">
                  <label for="mashkull">Mashkull</label>
                  <input type="radio" name="gjinia" id="femer" checked>
                  <label for="femer">Femer</label>
                  <input type="radio" name="gjinia" id="other">
                  <label for="other">Other</label>
                  <?php
                }else{
                  ?>
                  <input type="radio" name="gjinia" id="mashkull">
                  <label for="mashkull">Mashkull</label>
                  <input type="radio" name="gjinia" id="femer">
                  <label for="femer">Femer</label>
                  <input type="radio" name="gjinia" id="other" checked>
                  <label for="other">Other</label>
                  <?php
                }
               ?>
              <div id="infoGjinia"></div>
            </div>
            <div id="emailDiv">
              E-mail <input type="text" class="form-control" name="email" id="email" placeholder="e-mail" value="<?php echo $email ?>">
            </div>
            <div id="infoEmail"></div>
            <div id="adresaDiv">
              Adresa <input type="text" class="form-control" name="adresa" id="adresa" placeholder="Adresa" value="<?php echo $adresa ?>">
            </div>
            <div id="infoAdresa"></div>
            <div class="fileDiv">
              <input type="file" name="file" id="file">
            </div>
            <div id="buttonatDiv">
              <div id="modifikoDiv">
                <input type="submit" class="btn btn-success" name="modifiko" id="modifiko" value="Modifiko" onclick="modifikoTeDhenat()">
              </div>
              <div class="back">
                <a href="http://localhost/PW/Client/profili.php"> <button type="button" class="btn btn-success" name="back" id="back">Back</button></a>
              </div>
            </div>
          </div>
        </div>
        <style media="screen">
          #buttonatDiv{
            display: block;
          }

          #modifikoDiv{
              display: inline-block;
              width: 50%;
              margin-top: 20px;
              text-align: center;
          }

          .back{
            display: inline-block;
            width: 50%;
            float: right;
            margin-top: 20px;
            text-align: center;
          }
        </style>
      </body>
    </html>
    <?php
  }else{
    header("Location: http://localhost/PW/Log%20in%20&%20Sing%20up/login.php");
  }
 ?>
