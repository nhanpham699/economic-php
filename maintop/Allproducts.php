
<?php 
     if(isset($_GET["page"])){
        $p = $_GET["page"];
     }else{
        $p = '';
     }
     if($p == '' || $p == 1){
        $page = 0;
     }
     else{
          $page = ($p*8)-8;
     }

     $sql_products = "SELECT * FROM products limit $page,8";
     $result_products = $connect->query($sql_products);
?>
  <div id="allproduct">
        <ul class="main_product">
            <?php
                while ($row = $result_products->fetch_assoc()) {                              
            ?>
            <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>">
            <li> 
                <img class="imgproduct" style="width: 160px; height: 140px; margin-left: 4%"  src="<?php echo $row['image']; ?>"> 
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
      $sql_page = "SELECT * FROM products"; 
      $result_page = $connect->query($sql_page);
      $count = mysqli_num_rows($result_page);
      $a = ceil($count/8);
   
      if($p > 3){
        $first_page = 1;
        echo '<a href="index.php?view=allproducts&page='.$first_page.'">First</a>';
      }
      if($p > 1){
         $pageDown = $p - 1;
         echo '<a href="index.php?view=allproducts&page='.$pageDown.'">&laquo;</a>';  
      }

      for($b = 1; $b <= $a; $b++){ 
         if( $b == 1 && $p == 0){
               echo '<a class="active">'.$b.'</a>';  
            }else if($b != $p){
              if($b>(float)$p-3 && $b<(float)$p+3){
               echo '<a href="index.php?view=allproducts&page='.$b.'">'.' '.$b.' '.'</a>'; 
              }
           }else{
              echo '<a class="active">'.$b.'</a>';
             }
          }
          if($p==0){
              $next_page = (float)$p + 2;
              echo '<a href="index.php?view=allproducts&page='.$next_page.'">&raquo;</a>';
          }
          else if($p < $a){
              $next_page = (float)$p + 1;
              echo '<a href="index.php?view=allproducts&page='.$next_page.'">&raquo;</a>';
             }
          if($p < $a-2){
             echo '<a href="index.php?view=allproducts&page='.$a.'">Last</a>';
           }
 ?>
     
 </div>   

         


