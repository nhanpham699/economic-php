<?php 
    if(isset($_GET["page"])){
       $p = $_GET["page"];
      }else{
            $p = '';
       }
    if($p == '' || $p == 1){
      $page = 0;
      }else{
        $page = ($p*8)-8;
        }
    if(isset($_GET['idKind'])){
      $idKind = $_GET['idKind'];
      $sql = "SELECT * FROM products where idKind = '$idKind' limit $page,8 ";
      $result = $connect->query($sql);
    }
?>
 <div id="product">
  <ul class="main_product">
      <?php
          while ($row = $result->fetch_assoc()) {                              
       ?>
      <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>"> 
      <li> 
          <img style="width: 160px; height: 140px; margin-left: 4%" src="<?php echo $row['image']; ?>"> 
          <p> <?php echo '&emsp;' . $row['name'];  ?> </p> 
          <div class="tien"> <?php echo number_format($row['price'], 0, '','.') .'đ'; ?></div> 
          <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>">&emsp;<button type="button" class="btn btn-danger">Mua ngay</button></a>
      </li>
      </a>
      <?php } ?>
  </ul>
</div>
<div id="pagination" class="pagination" style=" padding:20px 0px; margin-left: 110px;  clear: both;">  
    <?php 
      $sql_page = "SELECT * FROM products where idKind = '$idKind'"; 
      $result_page = $connect->query($sql_page);
      $count = mysqli_num_rows($result_page);
      $a = ceil($count/8);
   
      if($p > 3){
        $first_page = 1;
        echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$first_page.'">First</a>';
      }
      if($p > 1){
         $pageDown = $p - 1;
         echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$pageDown.'">&laquo;</a>';  
      }

      for($b = 1; $b <= $a; $b++){ 
         if( $b == 1 && $p == 0){
               echo '<a class="active">'.$b.'</a>';  
            }
         else if($b != $p){
            if($b>(float)$p-3 && $b<(float)$p+3){
              echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$b.'">'.' '.$b.' '.'</a>'; 
            }
         }else{
            echo '<a class="active">'.$b.'</a>';
           }
         }
         if($p==0){
            $next_page = (float)$p + 2;
            echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$next_page.'">&raquo;</a>';
         }else if($p < $a){
            $next_page = (float)$p + 1;
            echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$next_page.'">&raquo;</a>';
          }
         if($p < $a-2){
           echo '<a href="index.php?view=product&idKind='.$idKind.'&page='.$a.'">Last</a>';
          }
 ?> 
 </div>