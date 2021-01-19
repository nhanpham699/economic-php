<?php
    include 'connect.php'; 
    session_start();
    if(isset($_POST["newpassword"])){
    	$id = $_SESSION['id'];
        $newpassword = $_POST['newpassword'];
        $sql_update = "UPDATE user SET password = '$newpassword' where id = '$id'";
        $connect->query($sql_update);
      }
?>     