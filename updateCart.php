<?php
    include 'connect.php'; 
    session_start();
    if(isset($_POST["id"]) && isset($_POST["num"])){
        $id = $_POST["id"];
        $num = $_POST["num"];
   	   	if($num > 0){
        $sql_update = "UPDATE cart SET quantum = '$num' where id = '$id'";
        $connect->query($sql_update);
      }else{
        $sql_delete = "DELETE FROM cart WHERE id ='$id'";
        $connect->query($sql_delete); 
      }
    }
?>     