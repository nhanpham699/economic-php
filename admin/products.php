<div style="margin: 1% 7%;" class="col-lg-6">
    <div class="input-group">
      <input onkeyup="Search()" id="search" name="search" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
 </div><!-- /.col-lg-6 -->
<div id="listProduct">
  <table  class="table table-hover"  >
      <tr> 
      	  <th colspan="6"> <span style=" font-weight: normal; margin-left: 20%; font-size:35px;letter-spacing: 10px; text-transform: uppercase">Danh sách sản phẩm</span> </th>
      	   <td colspan="2"> <a href="admin.php?view=addproduct"><button class="btn btn1 btn-primary">Thêm sản phẩm</button></a></td>
      </tr>  
      <tr id="tr1pr">  
           <!-- <td>Mã sản phẩm</td> -->
           <td>Ảnh sản phẩm</td>
           <td>Tên sản phẩm</td>
           <td>Màu</td>
           <td>Đơn giá</td>
           <td>Số lượng</td>
           <td>id loại</td>
           <td>Sửa</td>
           <td>Xóa</td>
      </tr>
      <?php
            // session_start();
            $total = 0;
            $sql_list = "SELECT * FROM products";
            $result_list = $connect->query($sql_list); 
            while($row = $result_list->fetch_assoc()){
       ?>
       <tr id="tr2pr_<?php echo $row['id']; ?>">
             <td><img style="width: 100px; height: 70px;" src="<?php echo "." . $row["image"]; ?>" ></td>
             <td> <?php echo $row["name"]; ?></td>
             <td> <?php echo $row["color"]; ?></td>
             <td><?php echo number_format($row["price"],0,'','.'); ?>đ</td>
             <td> <?php echo $row["quantum"]; ?> </td>
             <td> <?php echo $row["idKind"]; ?></td>
             <td> <a href="admin.php?view=updateproduct&idsp=<?php echo $row['id']; ?>"><button class="btn btn-primary">Sửa</button></a></td>
             <td> <a href="admin.php?view=deleteproduct&idsp=<?php echo $row['id']; ?>"><i id="delete" class="fa fa-trash"></i> </td>
       </tr>
      <?php } ?>
  </table>  
</div>       