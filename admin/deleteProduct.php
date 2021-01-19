<?php 
  if(!isset($_SESSION))
  {
   session_start();
  }
    if(!isset($_SESSION['Username'])){
       	     header('location: loginA.php');
       }
     if(isset($_GET['idsp'])){
     	  $idsp = $_GET['idsp'];
       }else{
         $idsp = '' ; 
       }
       if($idsp == ''){
          header('location: admin.php?view=products');
       }
     $sql_delete = "DELETE FROM products WHERE id ='$idsp'";
     $connect->query($sql_delete);
     header('location: admin.php?view=products');
?>