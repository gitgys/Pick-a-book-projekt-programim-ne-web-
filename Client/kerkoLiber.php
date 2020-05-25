<?php

if(isset($_POST['submit'])){
  //tipi percakton ne qofte se rezultatet e kerimit do te vendosen poshte text box-it(qe do te shfaqe vete 5 rezultate)
  //apo do te vendosen brenda nje divi ku do te shfaqen te gjitha rezultatet e mundshme
  $type = $_POST['type'];
  //behte lidhja me databasen
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  if (mysqli_connect_errno()) {
    echo "error";
    exit();
  }

  //kerkim i avancuar sipas titullit
  if(isset($_POST['titulli'])){
    //titulli qe do te jete kusht per kerkimin
    $titulli = $_POST['titulli'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriTitulli = "select * from LIBER where titulli like '%$titulli%' and zhaneri = '$zhaneri'";
      }else{
        $queriTitulli = "select * from LIBER where titulli like '%$titulli%'";
      }
    }else{
      $queriTitulli = "select * from LIBER where titulli like '%$titulli%'";
    }

    //ekzekutojme querine qe ben kerkimin sipas titullit
    $resultForTitulli = mysqli_query($connection, $queriTitulli);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH);
        if($rowForTitulli == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/Client/libri.php?liber_id=".$rowForTitulli['liber_id']."'>".$rowForTitulli['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){
      //kod
      ?><table><?php
      while($rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH)){
        ?><tr><?php
        for($i = 0; $i < 3; $i++){
          if($rowForTitulli != null){
            ?>
            <td>
              <div class="cell">
                <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $rowForTitulli['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $rowForTitulli['imazhi']; ?>" style="width: 100%; height:300px;" alt="Liber"> </a><br>
                <?php echo $rowForTitulli['titulli']; ?>
                <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $rowForTitulli['liber_id']; ?>">Rezervo</button>
              </div>
            </td>
            <?php
          }else {
            ?>
            <td>no result</td>
            <?php
          }
          $rowForTitulli = mysqli_fetch_array($resultForTitulli, MYSQLI_BOTH);

        }
        ?></tr><?php
      }
      ?></table><?php

    }else {
      echo "no results";
    }
  //kerkim i avancuar sipas autorit
  }else if(isset($_POST['autori'])){
    //autori qe do te jete kusht per kerkimin
    $autori = $_POST['autori'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriAutori = "select * from LIBER where autori like '%$autori%' and zhaneri = '$zhaneri'";
      }else{
        $queriAutori = "select * from LIBER where autori like '%$autori%'";
      }
    }else{
      $queriAutori = "select * from LIBER where autori like '%$autori%'";
    }
    //ekzekutojme querine qe ben kerkimin sipas autorit
    $resultForAutori = mysqli_query($connection, $queriAutori);
    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH);
        if($rowForAutori == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/Client/libri.php?liber_id=".$rowForAutori['liber_id']."'>".$rowForAutori['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){
      //kod
      ?><table><?php
      while($rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH)){
        ?><tr><?php
        for($i = 0; $i < 3; $i++){
          if($rowForAutori != null){
            ?>
            <td>
              <div class="cell">
                <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $rowForAutori['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $rowForAutori['imazhi']; ?>" alt="Liber" style="width: 100%; height:300px;" > </a><br>
                <?php echo $rowForAutori['titulli']; ?>
                <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $rowForAutori['liber_id']; ?>">Rezervo</button>
              </div>
            </td>
            <?php
          }else {
            ?>
            <td>no result</td>
            <?php
          }
          $rowForAutori = mysqli_fetch_array($resultForAutori, MYSQLI_BOTH);
        }
        ?></tr><?php
      }
      ?></table><?php

    }else {
      echo "no results";
    }
  }else{
    //mban te dhenen qe do te jete si kusht kerkimi
    $libri = $_POST['libri'];

    //shohim ne qofte se zhaneri eshte percaktuar dhe bejme kerkimin sipas rastit
    if(isset($_POST['zhaneri'])){
      $zhaneri = $_POST['zhaneri'];
      if($zhaneri != "none"){
        $queriLibri = "select * from LIBER where (titulli like '%$libri%' or autori like '%$libri%') and (zhaneri = '$zhaneri')";
      }else{
        $queriLibri = "select * from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
      }
    }else{
      $queriLibri = "select * from LIBER where (titulli like '%$libri%') or (autori like '%$libri%')";
    }

    //ekzekutojme querine qe ben kerkimin sipas te dhenes se mare
    $resultForLibri = mysqli_query($connection, $queriLibri);

    //kthejme rezultatet qe do te vendosen poshte text box-it
    if($type == "searchBox"){
      for($i = 0; $i < 5; $i++){
        $rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH);
        if($rowForLibri == NULL){
          break;
        }else {
          echo "<div id = 'libri'> <a href='http://localhost/PW/Client/libri.php?liber_id=".$rowForLibri['liber_id']."'>".$rowForLibri['titulli']."</a></div>"?><br><?php
        }
      }
    //kthejme te gjitha rezultatet e mundshme te gjetura
    }else if($type == "searchButton"){

    //kod

    ?><table><?php
    while($rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH)){
      ?><tr><?php
      for($i = 0; $i < 3; $i++){
        if($rowForLibri != null){
          ?>
          <td>
            <div class="cell">
              <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $rowForLibri['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $rowForLibri['imazhi']; ?>" alt="Liber" style="width: 100%; height:300px;"> </a><br>
              <?php echo $rowForLibri['titulli']; ?>
              <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $rowForLibri['liber_id']; ?>">Rezervo</button>
            </div>
          </td>
          <?php
        }else {
          ?>
          <td>no result</td>
          <?php
        }
        $rowForLibri = mysqli_fetch_array($resultForLibri, MYSQLI_BOTH);
      }
      ?></tr><?php
    }
    ?></table><?php


    }else {
      echo "no results";
    }
  }
}
 ?>
