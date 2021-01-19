<?php  
  if(!isset($_SESSION)){
    session_start();   
   }
 ?>
<?php     
  include 'connect.php';        
  if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $get_infor = "SELECT * FROM user where username = '$name' AND password = '$password'";
    $result_infor = $connect->query($get_infor);
    $_SESSION['username'] = $name;
    // $_SESSION['password'] = $password;
    if($row = $result_infor->fetch_assoc()){
       $_SESSION['id'] = $row['id'];
       $_SESSION['email'] = $row['email'];
       $_SESSION['phone'] = $row['phone'];
       $_SESSION['name'] = $row['name'];
       $_SESSION['address'] = $row['address'];
    }         
  }                 
?>   
         