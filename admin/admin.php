<?php
   session_start();
   include '../connect.php';
   if(!isset($_SESSION['Username'])){
       header('location: loginA.php');
   }
   if(isset($_GET['view'])){
       $t = $_GET['view'];
   }else{
       $t = '';
   }
?>
<!DOCTYPE html>
<html>
<head>
       <title> web của Nhân</title>
       <meta charset="utf-8"> 
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
       <link rel="stylesheet" href="index.css" /> 
      
</head>
<body>   
      <div id="top">
         <ul>
               <!-- <li><a  href="admin.php?view=addProduct">Thêm Sản phẩm</a></li> -->
               <li><a  href="admin.php?view=products">Quản lý Sản phẩm</a></li>
               <li><a href="admin.php?view=orders">Quản lý đơn hàng</a></li>
               <li><a href="admin.php?view=users">Quản lý người dùng</a></li>
               <li><a href="admin.php?view=statistical">Thống kê mặt hàng</a></li>

         </ul>
         <p style=" color: white;font-weight: bold;font-size: 17px;position: absolute; top: 10px ;right: 2%">Chào <?php echo $_SESSION['Username']; ?>&nbsp;<a style="font-size: 13px; color: #ffffffba" href="logoutA.php">Đăng xuất</a></p>
      </div> 
      <div id="content">
           <?php         
               if($t == 'products'){
                  include 'products.php';   
               }else if($t == 'addproduct'){
                  include 'addProduct.php' ;    
               }else if($t == 'updateproduct'){
                  include 'updateProduct.php' ;    
               }else if($t == 'deleteproduct'){
                  include 'deleteProduct.php' ;    
               }else if($t == 'orders'){
                  include 'ordersA.php' ;    
               }else if($t == 'detailUsers'){
                  include 'detailUsers.php' ;    
               }else if($t == 'detailOrders'){
                  include 'detailOrdersA.php' ;    
               }else if($t == 'statistical'){
                  include 'statistical.php' ;    
               }else if($t == 'users'){
                  include 'users.php' ;    
               }else{
                  include 'products.php';
               }
            ?>
      </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
       <script type="text/javascript" src="../index.js"> </script>   
</body>
</html>       