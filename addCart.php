<?php
     session_start();
     include 'connect.php';
     
     if(isset($_POST["id"]) && isset($_POST["num"]) && isset($_POST["size"])){
         $iduser = $_SESSION['id'];
  	   // echo $_POST["id"];  
         $id = $_POST["id"];
         $num = $_POST["num"];
         $size = $_POST["size"];
         // get from product table
         $sql = "SELECT * FROM products where id = '$id'" ;
         $result = $connect->query($sql);
         $row = mysqli_fetch_row($result);
         // get form cart table
         $sql1 = "SELECT * FROM cart where idproduct = '$id' AND size = '$size' AND iduser = '$iduser' " ;
         $result1 = $connect->query($sql1);
         $row1 = $result1->fetch_assoc();
         $idcart = $row1["id"];
         $count = mysqli_num_rows($result1);
 
         if($count == 1){
                 (int)$num1 = $num + $row1["quantum"];
                 // (int)$num2 = $row[3] - $num ;
                 $sql_update = "UPDATE cart SET quantum = '$num1'  where id = '$idcart' ";
                 $connect->query($sql_update);
         }else{
         //sql addcart
         $add = "INSERT INTO cart(name, price, quantum, image, idKind, color, size, iduser,idproduct) values('$row[1]','$row[2]','$num','$row[4]','$row[5]', '$row[6]', '$size', '$iduser','$id')"; 
         $connect->query($add);
           }
       }
?>