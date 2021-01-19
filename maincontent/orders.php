
<div class="shopping-cart">
      <!-- Title -->
      <div class="title">
        Đơn hàng của bạn
      </div>
     <ul class="maincart"> 
      <?php
            if(!isset($_SESSION['username'])){
              header("location: index.php");
            }
            $total = 0;
            $iduser = $_SESSION["id"];
            $sql_orders = "SELECT * FROM orders where iduser = '$iduser'";
            $result_orders = $connect->query($sql_orders); 
            $count_Orders = mysqli_num_rows($result_orders);
            if($count_Orders == 0){ ?>
                 <img style="width: 200px; margin: 40px 43.5% 0 43.5%;" src="images/cart.png">
                 <a href="index.php?view=allproducts">
                  <button style=" margin: -10px 42%; height: 40px;width: 160px;" class="btn btn-danger">Tiếp tục mua hàng</button>
                 </a>
                 <br><br><br> 
           <?php }else{
            while($row = mysqli_fetch_row($result_orders)){
       ?>
      <!-- Product-->
      <div id="showDetailOrders_<?php echo $row[0]?>" class="modal fade" tabindex="-1" role="dialog">
      <div id="detailOrders">
            <!-- Title -->
            <div class="title">
               Mã đơn: <?php $idorders = $row[0]; echo $idorders ?> 
            </div>
           <ul class="maincart"> 
            <?php
                  
                  $sql_list = "SELECT * FROM detailorders where iduser = '$iduser' AND idorders='$idorders' ";
                  $result_list = $connect->query($sql_list); 
                  while($row1 = $result_list->fetch_assoc()){
             ?>
            <!-- Product-->
            <li>
                <div class="itemProducts">
                    <div class="image">
                        <img style="width: 120px; height: 90px;" src="<?php echo $row1["image"]; ?>">
                    </div>

                    <div class="description">
                      <span><?php echo $row1["name"]; ?></span>
                      <span>Size <?php echo $row1["size"]; ?></span>
                      <span>Màu <?php echo $row1["color"]; ?></span>
                      <span><?php echo number_format($row1["price"],0,'','.'); ?>đ</span>
                    </div>
                    <div class="quantity num">
                       <span><?php echo $row1["quantum"];?></span>
                    </div>

                    <div class="total-price">
                      <span>
                      <?php 
                           echo number_format($total1 = $row1["price"] * $row1["quantum"],0, '','.'); 
                        ?>đ
                      </span>
                    </div>
                  </div> 
             </li>
             <?php } ?>  
          </ul> 
      </div>
   </div>    
     <style type="text/css">
       div.ordersInformation:hover{
          cursor: pointer;
       }
       span#shipping, span#bringed, span#destroy{
          margin-left: -20px;
       }
     </style>   
      <li>           
          <div class="itemProducts">
              <div class="image idOrders">
                  <span> <?php echo $row[0]; ?></span>
              </div>

              <div onclick="showDetailOrders(<?php echo $row[0] ;?>)" class="description ordersInformation">
                <span>Ngày mua: <?php echo $row[1]; ?></span>
                <span>Tổng tiền: <?php echo number_format($row[2],0,'','.'); ?>đ</span>
              </div>
              <div class="status">
                <span style="font-size: 17px ;float: left;" id="Status_<?php echo $row[0]; ?>">
                  <?php if($row[3]== 1){?><span style="color: #ff7200"> Đang chờ xác nhận</span><?php } ?>
                  <?php if($row[3]== 2){?><span style="color: green"> Đã xác nhận </span><?php } ?>
                  <?php if($row[3]== 3){?><span id="destroy" style="color: red"> Đơn hàng đã bị hủy</span><?php } ?>
                  <?php if($row[3]== 4){?><span id="shipping" style="color: blue"> Đang vận chuyển </span><?php } ?>
                  <?php if($row[3]== 5){?><span id="bringed"style="color: green"> Đã giao</span><?php } ?>
               </span>
              </div>
              <?php if($row[3] == 1 || $row[3] == 2){ ?>
               <i onclick="deleteOrder('<?php echo $row[0]; ?>')" style =" margin-top: 35px;color: black" class="fa fa-times"></i>
              <?php } ?>
            </div>
       </li>      
       <?php } }?>

    </ul> 
    
</div>
<script type="text/javascript">
   function deleteOrder(id){
       document.getElementById('showDetailOrders_'+id).style.display = "none";
       $.post("deleteOrder.php",{'id':id}, function(){
           alert("Xóa đơn hàng thành công!!");
           location.reload(true);
       });
   }
</script>
<!--detail orders  -->



          <!-- orders table -->