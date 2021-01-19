<?php  
          session_start();
          include '../connect.php'; 
           
          if(isset($_SESSION['Username'])){
            header('location: admin.php');
          }
       
          if(isset($_POST['submitA'])){

            $name = $_POST['usernameA'];
            $password = $_POST['passwordA'];

            // echo $name . ',' .$password;

            $get_admin = "SELECT * FROM admin where username = '$name' AND password = '$password'";
            $result_admin = $connect->query($get_admin);
             $num3 = mysqli_num_rows($result_admin);
             if($num3 == 1){
                $_SESSION['Username'] = $name;
                $_SESSION['Password'] = $password;
              if($row = $result_admin->fetch_assoc()){
               $_SESSION['idd'] = $row['id'];
               $_SESSION['profile'] = $row['profile'];
             }
               header('location: admin.php');
            }else{
                 header('location: loginA.php');
              
                }
                //  
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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="index.css" /> 
       <!-- <script type="text/javascript" src="index.js"> </script> -->
       <style type="text/css">
         body{
           background-image: url(../images/giay2.jpg);
           background-size : cover; 
         }
       </style>
</head>
<body>
<div id="loginA">  
  <form method="POST" >
    <div class="form-group">
      <label style="color: orange; font-size: 12px;" for="exampleInputEmail1">Tên đăng nhập</label>
      <input name="usernameA" type="text" class="form-control" id="usernameA" placeholder="Tên đăng nhập">
    </div>
    <div class="form-group">
      <label style="color: orange; font-size: 12px;" for="exampleInputPassword1">Mật khẩu</label>
      <input name="passwordA" type="password" class="form-control" id="passwordA" placeholder="Mật khẩu">
    </div>
    <button name="submitA" type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>