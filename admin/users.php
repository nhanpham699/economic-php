<div style="width: 85%" id="listProduct">
  <table  class="table table-hover"  >
      <tr> 
      	  <td colspan="5"> <p style="text-align:center;font-weight: normal; font-size:33px;letter-spacing: 7px; text-transform: uppercase">&nbsp;Tài khoản khách hàng</p> </td>
      </tr>  
      <tr id="tr1pr">  
           <td>Mã khách hàng</td>
           <td>Tên khách hàng</td>
           <td>Tên đăng nhập</td>
           <td>Email</td>
           <td>Số điện thoại</td>
      </tr>
      <?php
            // session_start();
            $total = 0;
            $sql_list = "SELECT * FROM user";
            $result_list = $connect->query($sql_list); 
            while($row = $result_list->fetch_assoc()){
       ?>
       <tr id="tr2pr_<?php echo $row['id']; ?>">
             <td> <?php echo $row["id"]; ?></td>
             <td> <?php echo $row["name"]; ?></td>
             <td> <?php echo $row["username"]; ?></td>
             <td> <?php echo $row["email"]; ?></td>
             <td> <?php echo $row["phone"]; ?> </td>
       </tr>
      <?php } ?>
  </table>  
</div>       