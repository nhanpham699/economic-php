<?php
   session_start();
   include 'connect.php';
   if(isset($_POST['id'])){
       $id = $_POST['id'];
  	   $sql_delete = "DELETE FROM cart WHERE id ='$id'";
       $connect->query($sql_delete);
     }
?>