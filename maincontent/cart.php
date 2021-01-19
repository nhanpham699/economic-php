  <div id="shopping-cart" class="shopping-cart">
    <div id="maincart">
      <!-- Title -->
      <div class="title">
        Giỏ hàng của bạn
      </div>
      
     
      <?php
            if(!isset($_SESSION['username'])){
              header("location: index.php");
            }
            include 'connect.php';
            // session_start();
            $total = 0;
            $iduser = $_SESSION["id"];
            $sql_list = "SELECT * FROM cart where iduser = '$iduser'";
            $result_list = $connect->query($sql_list);
            $count_Cart = mysqli_num_rows($result_list);
            if($count_Cart == 0){ ?>
                 <div style="height: 380px">
                     <img style="width: 200px; margin: 40px 43.5% 0 43.5%;" src="images/cart.png">
                     <a href="index.php?view=allproducts">
                      <button style=" margin: -10px 42%; height: 40px;width: 160px;" class="btn btn-danger">Tiếp tục mua hàng</button>
                     </a> 
                 </div>
      </div> 
    </div>          
           <?php }else{ ?>
     <ul class="maincart"> 
          <?php  while($row = $result_list->fetch_assoc()){
       ?>
      <!-- Product-->
      <li>
          <div class="itemProducts">
              <i id="delete" onclick="deleteCart(<?php echo $row["id"]; ?>)" class="fa fa-times"></i> 
              <div class="image">
                  <img style="width: 120px; height: 90px;" src="<?php echo $row["image"]; ?>">
              </div>

              <div class="description">
                <span><?php echo $row["name"]; ?></span>
                <span>Size <?php echo $row["size"]; ?></span>
                <span>Màu <?php echo $row["color"]; ?></span>
                <span><?php echo number_format($row["price"],0,'','.'); ?>đ</span>
              </div>
              <div class="pricecart">
                 
               </div> 

              <div class="quantity">
                 <button onclick="reductionNumInCart(<?php echo $row['id'].','.$row["price"]; ?>)" id="Quantum">-</button><input class="disableNum" min=1 value="<?php echo $row['quantum']; ?>" style="text-align: center;width: 40px;" id="quantum_<?php echo $row['id']; ?>" disabled><button onclick="increaseNumInCart(<?php echo $row['id'].','.$row["price"]; ?>)">+</button>
              </div>

              <div id="total-price_<?php echo $row['id']; ?>" class="total-price">
                <?php 
                     echo number_format($total1 = $row["price"] * $row["quantum"],0, '','.'); 
                     if($row['iduser'] == $iduser){
                       $total += $total1 ;
                       } 
                  ?>đ
              </div>
              
          </div>  
       </li>

       <?php } ?>  
    </ul>
    <span id="total"><b>Tổng cộng:</b> <?php echo number_format($total,0,'','.'); ?>đ </span> 
    <!-- <a href="index.php?view=cart"><button id="updateCart" class="btn btn-primary">Cập nhật</button></a> -->
    <button id="od" onclick="order()" class="btn btn-danger">Đặt hàng</button>
    <a href="index.php?view=allproducts"><button id="continueBuy" class="btn btn-primary">Tiếp tục mua hàng</button></a>
    
  </div>
</div>
<?php 
    $_SESSION['total'] = $total ;
   }
?>







  