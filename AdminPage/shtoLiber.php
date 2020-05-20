<!DOCTYPE html>
<html>
  <head>
    <title>Shto liber</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/PW/AdminPage/menaxhoLiberScript.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/shtoLiber.css">
  </head>
  <body>

   <?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      include_once("Style/headerAdmin.html");
      include_once("Style/backgroundAdmin.html");
      ?>
        <div class="allClass">
          <label for="barcode">Barcode</label><br>
          <input type="number" min="0" name="barcode" id="barcode" class="form-control" placeholder="Barcode"><br>
          <label for="titulli">Titulli</label><br>
          <input type="text" name="titulli" id="titulli" class="form-control" class="form-control" placeholder="Titulli"><br>
          <label for="autori">Autori</label><br>
          <input type="text" name="autori" id="autori" class="form-control" placeholder="Autori"><br>
          <label for="zhaneri">Zhaneri</label>
          <select id="zhaneri" class="form-control" name="zhaneri">
            <option value="none">None</option>;
            <option value="autobiografi">Autobiografi</option>;
            <option value="biografi">Biografi</option>;
            <option value="roman">Roman</option>;
            <option value="poezi">Poezi</option>;
            <option value="novele">Novele</option>;
            <option value="perFemije">Per femije</option>;
            <option value="historik">Historik</option>;
            <option value="fjalor">Fjalor</option>;
            <option value="enciklopedi">Enciklopedi</option>;
            <option value="tjeter">Tjeter</option>;
          </select><br>
          <label for="vitiIPublikimit">Viti i publikimit</label><br>
          <input type="month" name="vitiIPublikimit" id="vitiIPublikimit" class="form-control"><br>
          <label for="Shtepia botuese">Shtepia botuese</label><br>
          <input type="text" name="shtepiaBotuese" id="shtepiaBotuese" class="form-control" placeholder="Shtepia botuese"><br>
          <label for="sasia">Sasia</label><br>
          <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia"><br>
          <label for="pershkrimi">Pershkrimi</label><br>
          <textarea name="pershkrimi" id="pershkrimi" class="form-control" rows="6" cols="40" maxlength="2000" placeholder="Vendosni nje pershkrim te shkurter.." style="resize: none"></textarea><br>

          <div class="fileClass">
            <input type="file" name="file" id="file"><br>
          </div>

          <div class="buttons">
            <div class="shto">
              <input type="submit" name="submit" value="Shto" class="btn btn-success" onclick="shtoLiber()">
            </div>
            <div class="back">
              <a href="menaxhoLiber.php"><button type="button" class="btn btn-success" id = "back">Back</button></a>
            </div>
          </div>

        </div>
    <?php
  }else{
    header("Location: http://localhost/PW/AdminPage/menaxhoLiber.php");
  }
  ?>
  </body>
</html>
