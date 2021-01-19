<?php
    session_start();   
    include ("connect.php");
    if(isset($_POST['username'])){    
      $username = $_POST["username"];
      $password = md5($_POST["pass"]);
      // $password1 = $_POST["enterpassword"];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $name = $_POST['name'];
      $add = "INSERT INTO user(username, password, email, phone, name) values('$username','$password', '$email', '$phone', '$name')"; 
      $connect->query($add);             
    }
?> 