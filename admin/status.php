<?php
   include '../connect.php';
   if(isset($_POST["status"]) && isset($_POST["id"])){
   	  $id = $_POST["id"];
   	  $status = $_POST["status"];
   	  $update_status = "UPDATE orders SET status = '$status' where id = '$id' ";
   	  $connect->query($update_status); 
   } 
?>