<?php
  session_start();
   unset($_SESSION["Username"]);
  header('location: loginA.php');
?>