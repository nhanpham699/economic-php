<?php
  if(isset($_GET['idorders'])){
     $idorders = $_GET['idorders'];
  }
?> 
<div id="orderscontent">
  <table  class="table table-hover"  >
      <tr> <td colspan="7">&nbsp; <span style="color: brown; font-size: 30px;">Chi tiết sản phẩm (mã đơn:<?php echo $idorders ?>) </span> </td> </tr>  
      <tr id="tr1orders">  
           <!-- <td>Mã sản phẩm</td> -->
           <td>Ảnh sản phẩm</td>
           <td>Tên sản phẩm</td>
           <td>Màu</td>
           <td>Size</td>
           <td>Đơn giá</td>
           <td>Số lượng</td>
           <td>Thành tiền</td>
      </tr>
      <?php
            // include 'connect.php';
            $total = 0;
            
            $sql_list = "SELECT * FROM detailorders where idorders='$idorders' ";
            $result_list = $connect->query($sql_list); 
            while($row = $result_list->fetch_assoc()){
       ?>
       <tr id ="tr2orders">
             <td><img style="width: 100px; height: 70px;" src="<?php echo "." . $row["image"]; ?>" ></td>
             <td> <?php echo $row["name"]; ?></td>
             <td> <?php echo $row["color"]; ?></td>
             <td> <?php echo $row["size"]; ?></td>
             <td><?php echo number_format($row["price"],0,'','.'); ?>đ</td>
             <td><?php echo $row["quantum"];?></td>
             <td><?php echo number_format($total1 = $row["price"] * $row["quantum"],0, '','.');?>đ</td>
            
       </tr>
      <?php } ?>
  </table>  
</div>  