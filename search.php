     <?php
          if(isset($_POST['search'])){
            $search = $_POST['search'];
            $sql_search = "SELECT * FROM products where name like '%$search%' or price like '%$search%'";
            $result_search = $connect->query($sql_search);
            $count = mysqli_num_rows($result_search);
          }
     ?>
       <div style="min-height: 500px;" id="product">
         <?php 
               if($count == 0){ ?>
                 <div style="height: 500px"> 
                  <p style="color: #ff0000; font-size: 19px; margin-top: 5% ;margin-left: 37%;"> <i>không tìm thấy sản phẩm bạn vừa nhập  </i> </p>
                 </div> 
             <?php
               }else{
              ?>
         <ul class="main_product">
            <?php
                while ($row = $result_search->fetch_assoc()) {   
            ?>
            <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>">
             <li> 
                <img style="width: 160px; height: 140px; margin-left: 4%" src="<?php echo $row['image']; ?>"> 
                <p> <?php echo '&emsp;' . $row['name'];  ?> </p> 
                <div class="tien"> <?php  echo number_format($row['price'], 0, '','.').'đ'; ?></div> 
                <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>">&emsp;<button type="button" class="btn btn-danger">Mua ngay</button></a>
             </li>
            </a>
            <?php 
                } 
              }
            ?>
        </ul>