<?php
   if(isset($_SESSION['username'])){
   $iduser = $_SESSION['id'];
   $sql_count = "SELECT quantum FROM cart where iduser = '$iduser'";
   $result_count = $connect->query($sql_count);
   $count = 0;
   while($row = $result_count->fetch_assoc()){
     (int)$count = (int)$count + $row["quantum"];
     }
   }  
   // if(isset($_SESSION["brand_color"])){
   //   print_r($_SESSION["brand_color"]);
   // }
   // if(isset($_SESSION["brand_price"])){
   //   print_r($_SESSION["brand_price"]);
   // }
?>
<div class="navbvar" id="maintop">
  <ul class="main_top">
  	 <li><a href="index.php?view=about">Giới thiệu</a></li>
  	 <li><a href ="index.php?view=collection">Góc đẹp</a></li>
  	 <li><a href="index.php?view=allproducts">Sản phẩm</a></li>
  </ul>
  <?php if(isset($_SESSION['username'])){?>
   <i class="fa fa-user-circle"></i> 
  <ul class="main_name"> 
    <li><span style="color: white;"><?php echo $_SESSION['username'];?>&nbsp;</span>
      <ul class="main_infor">  
         <!-- <li><a onclick="setInfor()">Thông tin cá nhân</a></li>  -->
         <li><a onclick="showSwapPassword()">Đổi mật khẩu</a></li> 
         <li><a onclick="logout()">Đăng xuất</a></li>
      </ul>  
     </li>  
  <?php } ?>
  <p id="mail"> Nshop@gmail.com </p> 
  <img id="email" src="./images/mail.png"/>  
  <p id="sdt"> 0902123456 </p>      
  <img id="phone" src="./images/dt.png"> 
</div>
<div id="mainmenu">
<a href="index.php"><img id="logo" src="./images/N.jpg" /> </a>
     <ul class="main_menu">
        <li><a href="#"><image id="image_menu1" style="width: 76px;height: 95px;" src="images/giaynam.png"><p class="name_menu">Giày thể thao</p></a> 
           <ul class="sub_menu">
              <li><a href="index.php?view=product&idKind=a"> Giày adidass </a></li>
              <li><a href="index.php?view=product&idKind=n"> Giày nike </a></li>
              <li><a href="index.php?view=product&idKind=c"> Giày converse </a></li>
           </ul> 
        </li>
        <!-- <li><a href="index.php?view=product&idKind=h">Giày cao gót</a></li> -->
        <li><a href="index.php?view=product&idKind=f"><image id="image_menu2" style="width: 80px;height: 100px;" src="images/giaydabanh.png"><p class="name_menu">Giày đá bóng</p></a></li>
        <li><a href="index.php?view=product&idKind=ta"><image id="image_menu3" style="width: 70px;height: 45px;" src="images/aothun.png"><p class="name_menu">&nbsp;Áo thun</p></a></li>
        <li><a href="index.php?view=product&idKind=b"><image id="image_menu4" style="width: 85px;height: 75px;" src="images/balo.png"><p id="name_menu"> &emsp;&nbsp;Ba lô</p></a></li>
     </ul>  
  <?php if(!isset($_SESSION['username'])){ ?>
    <i id="shoppinguser" class="fa fa-user-circle"></i>
  <?php }else{ ?> 
     <div id="orderss"><a href="index.php?view=orders"> <img style="width: 17%; height: 33px;" src="./images/donhang.png" /></a> </div> 
     <span id="numCart"><?php echo $count; ?></span> 
<?php } ?>
  <a <?php if(!isset($_SESSION['username'])){?> onclick= "dontCart()" <?php }else{ ?> href="index.php?view=cart" <?php } ?>><i id="shoppingcart" class="fa fa-shopping-cart"></i></a> 
   <form id="searchForm" method="POST"  action="index.php?view=allproducts">
      <input id="searchText" name="search" type="search">
      <i class="fa fa-search"></i>
   </form>
</div>
                 <!-- <div id="sale" ><a href=""><img style="width:80px;height:70px" src="./sale.png" /></a> </div> -->
                 
          
