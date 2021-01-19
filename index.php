<?php  
       session_start();
       include 'connect.php';
       if(isset($_GET['view'])){
          $t = $_GET['view'];
        } else{
          $t = '';
        }
?>
<!DOCTYPE html>
<html>
<head>
	     <title>PNhân's web</title>
	     <meta charset="utf-8"> 
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
       <link rel="stylesheet" href="./ui_jquery/jquery-ui.css" /> 
       <link rel="stylesheet" href="owl.carousel/owl.carousel.min.css">
       <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css">
       <link rel="stylesheet" href="style.css" /> 
</head>
<body>
       <div id="header"> 
        <?php include("header.php") ?>  
      </div> 
      <div id="content">
              <?php 
                 if($t == ""){
                    include("maincontent/imageinhome.php"); ?>
                    <p style="position: relative; top: 15px; text-align: center; letter-spacing: 10px; text-transform: uppercase;font-size: 30px;"> Sản phẩm nổi bậc </p>
                    <div id="highlightdiv" class="owl-carousel owl-theme">
                      <?php include("highlightproducts.php") ?>  
                    </div>
                 <?php
                 }else if($t == 'cart'){
                      include("maincontent/cart.php");   
                 }else if($t == 'orders'){
                     include ("maincontent/orders.php");
                 }else if($t == 'collection'){
                  include("maintop/collection.php");
                 }else if($t == 'about'){
                  include("maintop/about.php");
                 }else if($t == 'detail'){
                   include ("maincontent/detail.php");
                 }else{
              ?>
              <div id="left-content">
                <?php include("leftcontent.php") ?>
              </div>
              <div id="right-content">           
                <?php include("rightcontent.php"); }?>
              </div>
      </div>
     <div id="footer"> 
      <footer class="footer-distributed">
         <?php include("footer.php"); ?> 
      </footer>
     </div>
 <!-- infomation product when ordering    -->
<div id="infoProduct" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style=" font-size: 20px; font-weight: bold; text-align: center; color: brown;" class="modal-title" id="gridSystemModalLabel">Thông tin sản phẩm</h4>
      </div>
      <div class="modal-body">
        <div id="inforRow" class="row">
            <table>
              <tr>
                 <td id="detaill" rowspan="5"> <img style="width: 250px;height:230px;" id="inforImage"> </td>            
                 <td> <i><b>Tên sản phẩm:</b> <span id="inforName"></span></i></td>
               </tr>     
              <tr><td><i><b>Số lượng:</b> <span id="inforNum"></span></i></td></tr>
              <tr><td><i><b>Màu:</b> <span id="inforColor"></span></i></td></tr>
              <tr><td><i><b>Size:</b> <span id="inforSize"></span></i></td></tr>
              <tr><td><i><b>Đơn giá:</b> <span id="inforPrice"></span></i></td></tr>
            </table>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <!-- register -->
<div id="register">
       <div class="getdata">
              <script type="text/javascript"> var array_checkexist = []; </script>
                <?php  
                       $get_checkexist = "SELECT * FROM user ";
                       $result_checkexist = $connect->query($get_checkexist);
                       while ($row = $result_checkexist->fetch_assoc()) {
                   ?>
                       <script type="text/javascript">
                           array_checkexist.push('<?php echo $row['username'];?>');
                           array_checkexist.push('<?php echo $row['email'];?>');
                       </script> 
                  <?php } ?> 
         </div>
           <div id="dk" class="modal fade" tabindex="-1" role="dialog">                

                <div class="signup-design"  id="signupDesign">    
                  <p> Đăng Ký  </p>
                  <!-- <button id="quit1" name="quit1">Thoát</button> -->
                  <div id="contentForm">
                      <div class="textbox1 clearfix">
                          <i class="fa fa-user"></i>
                          <input type="text" name="name" id="name" placeholder="Họ tên...">
                          <span id="errorN"></span>
                      </div>
                      <div class="textbox1">
                         <i class="fa fa-user"></i>
                         <input type="text" name="Username" id="Username" placeholder="Tên đăng nhập...">
                         <span id="errorU"></span>
                      </div>   
              
                      <div class="textbox1">
                         <i class="fa fa-lock"></i>
                         <input type="password" name="Password" id="Password"  placeholder="Mật khẩu...">
                         <span  id="errorPass"></span>                
                      </div>  
                      <div class="textbox1">
                         <i class="fa fa-lock"></i>
                         <input type="password" name="enterpassword" id="enterpassword"  placeholder="Nhập lại mật khẩu khẩu...">
                         <span  id="errorEPass"> </span>      
                      </div>
                      <div class="textbox1">
                          <i class="fa fa-envelope"></i> 
                          <input type="text" name="Email" id="Email" placeholder="Email...">
                          <span  id="errorE"> </span>
                      </div>
                      <div class="textbox1">
                          <i class="fa fa-phone"></i>
                          <input type="text" name="Phone" id="Phone" placeholder="Số điện thoại...">
                          <span id="errorP"> </span>
                      </div>
                      
                   <button class="btnn" id="submit" type="submit" name="submit"> Đăng ký </button>
                   </div>
                 </div>            
      </div>
  </div>
 </div>

<!-- Login       -->


<div id="login"> 
     <div class="getdata">
                <script type="text/javascript"> var array_checklogin = []; </script>
                <?php  
                       $get_checklogin = "SELECT * FROM user ";
                       $result_checklogin = $connect->query($get_checklogin);
                       while ($row = $result_checklogin->fetch_assoc()) {
                   ?>
                       <script type="text/javascript">
                           array_checklogin.push('<?php echo $row['username'];?>');
                           array_checklogin.push('<?php echo $row['password'];?>');
                       </script> 
                  <?php } ?> 
     </div>
<div id="dn" class="modal fade" tabindex="-1" role="dialog">
         <div class="signin-design" id="signinDesign">           
             <p> Đăng nhập  </p>
             <!-- <input id="quit" type="button" name="quit" value="Thoát"> -->
              <div class="textbox clearfix">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="&nbsp;Tên đăng nhập...">
                    <span id="errorUsername"></span>
              </div>   
              <div class="textbox">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" id="password"  placeholder="&nbsp;Mật khẩu...">
                    <span id="errorPassword"></span>                
              </div>  
                   <button class="btnn" id="submit1" type="submit" name="submit1"> Đăng Nhập </button>
                   <a id="signupButton">Bạn chưa có tài khoản? Đăng ký</a>
          </div>
        </div>
    </div>
   </div>
 <!-- //orders   -->
 <?php 
   if(isset($_SESSION['id'])){
    $iduser = $_SESSION['id'];  
    $get_usrer = "SELECT * FROM user where id = '$iduser'";
    $result_getuser = $connect->query($get_usrer);
    if($row = $result_getuser->fetch_assoc()){
       $username_user = $row['username']; 
       $name_user = $row['name'];
       $phone_user = $row['phone'];
       $email_user = $row['email']; 
       $password = $row['password'];
    }
   } 
 ?>
 <div id="Order" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="color: brown;font-size: 22px;" class="modal-title" id="exampleModalLabel">Vui lòng nhập thông tin vào form bên dưới</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label" >Họ tên:</label>
            <input type="text" class="form-control" id="recipient-name" value="<?php echo $name_user ;?>">
          </div>
          <div class="form-group">
            <label for="recipient-address" class="control-label" >Đia chỉ giao hàng:</label>
            <input type="text" class="form-control" id="recipient-address">
          </div>
          <div class="form-group">
            <label for="recipient-phone" class="control-label" >Số điện thoại liên lạc:</label>
            <input type="text" class="form-control" id="recipient-phone" value="<?php echo $phone_user ?>">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Ghi chú:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
        <button type="button" id="successOrders" class="btn btn-primary">Hoàn tất</button>
      </div>
    </div>
  </div>
</div>
<!-- swap password -->
 <div id="swapPassword" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <script> 
        var oldpassword ="<?php 
                            if(isset($_SESSION['username'])){
                               echo $row['password'];
                            }
                          ?>"
  </script>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="color: brown; font-size: 25px" class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="oldpassword" class="control-label" >Mật khẩu cũ:</label>
            <input type="password" class="form-control" id="oldpassword" name="enteroldpassword">
            <span id="errorOldpassword"> </span>
          </div>
          <div class="form-group">
            <label for="enteroldpassword" class="control-label" >Nhập lại mật khảu:</label>
            <input type="password" class="form-control" id="newpassword" name="enteroldpassword">
            <span id="errorNewpassword"> </span>
          </div>
          <div class="form-group">
            <label for="newpassword" class="control-label" >Mật khẩu mới:</label>
            <input type="password" class="form-control" id="enternewpassword">
            <span id="errorEnterNewpassword"> </span>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
        <button id="successSwap" class="btn btn-primary">Hoàn tất</button>
      </div>
    </div>
  </div>
</div>
       <script type="text/javascript" src="md5.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <script src="./ui_jquery/jquery-ui.js"></script>  
       <script src="owl.carousel/owl.carousel.min.js"></script>
       <script type="text/javascript" src="index.js"> </script>
</body>
</html> 