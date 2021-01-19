<?php
      if(isset($_SESSION["brand_color"]) || isset($_SESSION["brand_price"])){
            $sql_products = "SELECT * FROM products where color != ''";
            if(isset($_SESSION["brand_color"])){
                $brand_color = implode("','", $_SESSION['brand_color']);
                if($brand_color != ""){
                  $sql_products .= "AND color in('".$brand_color."')";
                 }
            }
            if(isset($_SESSION["brand_price"])){
               $brand_price = implode(" AND ", $_SESSION['brand_price']);
               if($brand_price != ""){
                  $sql_products .= "AND price between $brand_price";
                 }
            }   
    }else{
       $sql_products = "SELECT * FROM products";
    }        
            $result_products = $connect->query($sql_products);      
?>
   <div id="main_brand">
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

