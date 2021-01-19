<?php
  include '../connect.php';
  if(isset($_GET["idorders"])){
      $idorders = $_GET["idorders"];
  }else{
     header("location: admin.php?view=orders");
  }
  $sql = "SELECT * FROM orders where id = '$idorders' ";
  $result = $connect->query($sql);
?>
<body>
      <table border="2px" cellpadding="15">
         <tr><td><span style="padding: 10px; color: brown; font-size: 25px;">Chi tiết giao hàng(mã đơn:<?php echo $idorders ?>) </span></td></tr>
        <?php while($row = $result->fetch_assoc()){  ?>
         <tr>
            <td class="col-2">
              <span>
                <br>
                <p>&emsp;<b>Mã khách hàng: </b><?php echo $row["iduser"];?>&emsp;</p>
                <br>
                <p>&emsp;<b>Tên khách hàng: </b><?php echo $row["nameuser"];?>&emsp;</p>
                <br>
                <p>&emsp;<b>Số điện thoại: </b><?php echo $row["phone"];?>&emsp;</p>
                <br>
                <p>&emsp;<b>Địa chỉ: </b><?php echo $row['address'];?>&emsp;</p>
                <br>
                <p>&emsp;<b>Ghi chú: </b><?php echo $row['note'];?>&emsp;</p>
              </span>
            </td>
         </tr>
         
        <?php
           }
         ?> 
      </table>