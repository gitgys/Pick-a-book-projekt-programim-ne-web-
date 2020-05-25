<?php
//funksion qe mer te gjithe librat e databases
//variablat e funksionit jane variabli qe mban lidhjen e databases
function merLibra(){
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $queryInfoLiber = "select * from LIBER order by liber_id desc";
  $librat = array();
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $queryInfoLiber = "select * from LIBER order by liber_id desc";
  $resultForInfoLiber = mysqli_query($connection, $queryInfoLiber);
  while($rowResultForInfoLiber = mysqli_fetch_array($resultForInfoLiber, MYSQLI_BOTH)){
    $librat[] = $rowResultForInfoLiber;
  }
  return $librat;
}


function showLibrat($s){
  $connection = mysqli_connect('localhost', 'root', '', 'Database1');
  $queryInfoLiber = "select * from LIBER order by liber_id desc";
  $librat = merLibra();
  $start = $s;
  $end = $s + 9;
  ?><table><?php
  for($start; $start < $end; $start+=3){
    ?>
    <tr>
      <?php
      if(($start) < count($librat)){
        if($librat[$start] == null){
          ?>
          <td>No results</td>
          <?php
        }else{
          ?>
          <td>
            <div class="cell">
              <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $librat[$start]['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $librat[$start]['imazhi']; ?>" alt="Liber" style="width:100%; height:300px;" > </a>
              <?php echo $librat[$start]['titulli']; ?>
              <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $librat[$start]['liber_id']; ?>">Rezervo</button>
            </div>
          </td>
          <?php
        }
      }else {
        ?>
        <td>No results</td>
        <?php
      }
      if(($start + 1) < count($librat)){
        if($librat[$start + 1] == null){
          ?>
          <td>No results</td>
          <?php
        }else{
          ?>
          <td>
            <div class="cell">
              <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $librat[$start + 1]['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $librat[$start+1]['imazhi']; ?>" alt="Liber" style="width:100%; height:300px;"> </a>
              <?php echo $librat[$start + 1]['titulli']; ?>
              <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $librat[$start + 1]['liber_id']; ?>">Rezervo</button>
            </div>
          </td>
          <?php
        }
      }else {
        ?>
        <td>No results</td>
        <?php
      }
      if(($start + 2) < count($librat)){
        if($librat[$start + 2] == null){
          ?>
          <td>No results</td>
          <?php
        }else{
          ?>
          <td>
            <div class="cell">
              <a href="http://localhost/PW/Client/libri.php?liber_id=<?php echo $librat[$start + 2]['liber_id']; ?>"> <img src="http://localhost/PW/AdminPage/libraImg/<?php echo $librat[$start+2]['imazhi']; ?>" alt="Liber" style="width:100%; height:300px;"> </a>
              <?php echo $librat[$start + 2]['titulli']; ?>
              <button type="button" name="button" class="btn btn-outline-success" style="width:100%;" onclick="rezervo(this)" data-liber_id="<?php echo $librat[$start + 2]['liber_id']; ?>">Rezervo</button>
            </div>
          </td>
          <?php
        }
      }else {
        ?>
        <td>No results</td>
        <?php
      }
      ?>
    </tr>
    <?php
  }
?> </table><?php
}
 ?>
