<?php 
   include 'connect.php';
   if(isset($_POST["id"])){
   $id = $_POST["id"];	
   $delete_order ="UPDATE orders set status = 3 where id = '$id'";
   $connect->query($delete_order);
   } 
?>