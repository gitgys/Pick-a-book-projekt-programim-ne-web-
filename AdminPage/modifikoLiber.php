<?php
  if(!isset($_REQUEST['liber_id'])){
    header("location: http://localhost/PW/AdminPage/menaxhoLiber.php");
  }else {
    $liberId = $_REQUEST['liber_id'];
    $connection = mysqli_connect('localhost', 'root', '', 'Database1');
    $query = "select * from LIBER where liber_id = '$liberId'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($results, MYSQLI_BOTH);

    $barcode = $row['barcode'];
    $titulli = $row['titulli'];
    $autori = $row['autori'];
    $zhaneri = $row['zhaneri'];
    $vitiIPublikimit = $row['viti_i_publikimit'];
    $shtepiaBotuese = $row['shtepia_botuese'];
    $sasia = $row['sasia'];
    $pershkrimi = $row['pershkrimi'];

    session_start();
    //barkodi fillestare i librit
    $_SESSION['barcode'] = $barcode;
    $_SESSION['liber_id'] = $_REQUEST['liber_id'];
    include_once("Style/headerAdmin.html");
    include_once("Style/backgroundAdmin.html");
?>

 <!DOCTYPE html>
 <html>
   <head>
     <title>Shto liber</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script type="text/javascript" src="http://localhost/PW/AdminPage/menaxhoLiberScript.js"></script>
     <link rel="stylesheet" href="Style/modifikoLiber.css">
   </head>
   <body>
     <div class="allClass">

       <label for="barcode">Barcode</label>
       <input type="number" min="0" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="<?php echo $barcode ?>"><br>
       <label for="titulli">Titulli</label>
       <input type="text" name="titulli" id="titulli" class="form-control" placeholder="Titulli" value="<?php echo $titulli ?>">
       <div id="infoTitulli"></div><br>
       <label for="autori">Autori</label>
       <input type="text" name="autori" id="autori" class="form-control" placeholder="Autori" value="<?php echo $autori ?>">
       <div id="infoAutori"></div><br>
       <label for="zhaneri">Zhaneri</label>
       <select id="zhaneri" name="zhaneri" class="form-control">

         <?php
          if($zhaneri == 'none'){
            ?>
              <option value="none" selected>None</option>;
            <?php
          }else {
            ?>
                <option value="none">None</option>;
            <?php
          }
        ?>

        <?php
          if($zhaneri == 'autobiografi'){
            ?>
              <option value="autobiografi" selected>Autobiografi</option>;
            <?php
          }else{
            ?>
              <option value="autobiografi">Autobiografi</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'biografi'){
            ?>
              <option value="biografi" selected>Biografi</option>;
            <?php
          }else{
            ?>
              <option value="biografi">Biografi</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'roman'){
            ?>
              <option value="roman" selected>Roman</option>;
            <?php
          }else{
            ?>
              <option value="roman">Roman</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'poezi'){
            ?>
              <option value="poezi" selected>Poezi</option>;
            <?php
          }else{
            ?>
              <option value="poezi">Poezi</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'novele'){
            ?>
              <option value="novele" selected>Novele</option>;
            <?php
          }else{
            ?>
              <option value="novele">Novele</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'perFemije'){
            ?>
              <option value="perFemije">Per selected femije</option>;
            <?php
          }else{
            ?>
              <option value="perFemije">Per femije</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'historik'){
            ?>
              <option value="historik" selected>Historik</option>;
            <?php
          }else{
            ?>
              <option value="historik">Historik</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'fjalor'){
            ?>
              <option value="fjalor" selected>Fjalor</option>;
            <?php
          }else{
            ?>
              <option value="fjalor">Fjalor</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'enciklopedi'){
            ?>
              <option value="enciklopedi" selected>Enciklopedi</option>;
            <?php
          }else{
            ?>
              <option value="enciklopedi">Enciklopedi</option>;
            <?php
          }
         ?>
        <?php
          if($zhaneri == 'tjeter'){
            ?>
              <option value="tjeter" selected>Tjeter</option>;
            <?php
          }else{
            ?>
              <option value="tjeter">Tjeter</option>;
            <?php
          }
         ?>
       </select>
       <div id="infoZhaneri"></div><br>
       <label for="vitiIPublikimit">Viti i publikimit</label>
       <input type="month" name="vitiIPublikimit" id="vitiIPublikimit" class="form-control" value="<?php echo "".$vitiIPublikimit."-01" ?>"><br>
       <label for="Shtepia botuese">Shtepia botuese</label>
       <input type="text" name="shtepiaBotuese" id="shtepiaBotuese" class="form-control" placeholder="Shtepia botuese" value="<?php echo $shtepiaBotuese ?>"><br>
       <label for="sasia">Sasia</label>
       <input type="number" name="sasia" id="sasia" class="form-control" placeholder="Sasia" value="<?php echo $sasia ?>">
       <div id="infoSasia"></div><br>
       <label for="pershkrimi">Pershkrimi</label><br>
       <textarea name="pershkrimi" id="pershkrimi" class="form-control" rows="6" cols="40" maxlength="2000" placeholder="Vendosni nje pershkrim te shkurter.." style="resize: none"><?php echo $pershkrimi ?></textarea><br>
       <div class="fileDiv">
         <input type="file" name="file" id="file">
       </div>
       <div class="buttons">
         <div class="modifiko">
           <input type="submit" name="submit" class="btn btn-success" value="Modifiko" onclick="modifikoLiber()">
         </div>
         <div class="fshi">
           <input type="submit" name="submit" class="btn btn-success" value="Fshi" onclick="fshiLiber()">
         </div>
         <div class="back">
           <a href="menaxhoLiber.php"><button type="button" id = "back" class="btn btn-success">Back</button></a>
         </div>
       </div>
     </div>
   </body>
 </html>

<?php
}
?>
