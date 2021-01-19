<div style="margin: 1% 8%;" class="col-lg-6">
    <div class="input-group">
      <input onkeyup="Search()" id="search" name="search" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
<div id="orderscontent">
  <table  class="table table-hover"  >
      <tr> <th colspan="9"> <span style="font-weight: normal; font-size:35px;letter-spacing: 10px; text-transform: uppercase">ĐƠN HÀNG</span> </th> </tr>  
      <tr id="tr1orders">  
           <!-- <td>Mã sản phẩm</td> -->
           <td>Mã đơn</td>
           <td>Khách hàng</td>
           <td>Sản Phẩm</td>
           <td>Ngày mua</td>
           <td>Tổng tiền</td>
           <td>Trạng thái đơn </td>
      </tr>
      <?php
            // session_start();
            $sql_orders = "SELECT * FROM orders ";
            $result_orders = $connect->query($sql_orders); 
            while($row = mysqli_fetch_row($result_orders)){
       ?>
       <tr id ="tr2orders">
         <td> <?php echo $row[0]; ?></td>
         <td><a href="admin.php?view=detailUsers&idorders=<?php echo $row[0];?>"><?php echo $row[8]; ?></a></td>  
         <td><a href="admin.php?view=detailOrders&idorders=<?php echo $row[0];?>">Chi tiết sản phẩm</a></td>
         <td> <?php echo $row[1]; ?></td>
         <td><?php echo number_format($row[2],0,'','.'); ?>đ</td>
         <td>
            <select id="status_<?php echo $row[0];?>" onchange="status('<?php echo $row[0]; ?>')"> 
             <option value="1" <?php if($row[3] == 1){?> selected="selected"<?php } ?>>Đang chờ xác nhận</span></option>
             <option value="2" <?php if($row[3] == 2){?> selected="selected"<?php } ?>>Đã xác nhận</span></option>
             <option value="3" <?php if($row[3] == 3){?> selected="selected"<?php } ?>>Hủy đơn hàng</span></option>
             <option value="4" <?php if($row[3] == 4){?> selected="selected"<?php } ?>>Đang vận chuyển</span></option>
             <option value="5" <?php if($row[3] == 5){?> selected="selected"<?php } ?>>Đã giao</span></option>
            </select>
         </td>
       </tr>
      <?php } ?>
  </table>  
</div>  

