<?php 
    if(isset($_POST['logout'])){
      session_start();
      unset($_SESSION["username"]);
      unset($_SESSION["id"]);
      // unset($_SESSION["password"]);
      unset($_SESSION["email"]);
      unset($_SESSION["phone"]);
      unset($_SESSION["address"]);
      unset($_SESSION["name"]);
    }
?>