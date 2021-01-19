<?php
  if(!isset($_SESSION)){
  	session_start();
  }
  if(isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['note']) && isset($_POST['name'])){
  	  $address = $_POST['address'];
  	  $phone = $_POST['phone'];
  	  $note = $_POST['note'];
  	  $nameuser = $_POST['name'];

	  if(isset($_SESSION['id']) && isset($_SESSION['total'])){
	     $iduser = $_SESSION['id'];
	     $total = $_SESSION['total'];
	  }
	  include 'connect.php';
	  
	  $add_orders = "INSERT INTO orders(dateproducts,priceproducts,status,address,phone,note,iduser,nameuser) values(NOW(),'$total','1','$address','$phone','$note','$iduser','$nameuser')";
	  $connect->query($add_orders);
	  
	  $idorders = mysqli_insert_id($connect);
	  $get_cart = "SELECT * FROM cart where iduser = '$iduser'";
	  $result_cart = $connect->query($get_cart);
	  while($row = mysqli_fetch_row($result_cart)){
		  $connect->query( "INSERT INTO detailorders(name, price, quantum, image, idKind, color,size, idorders, iduser,idproduct) values('$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$idorders', '$iduser','$row[9]')");
		  $connect->query("UPDATE products SET quantum = quantum - '$row[3]' where id = '$row[9]'"); 
		}
	   $sql_delete = "DELETE FROM cart WHERE iduser ='$iduser'";
       $connect->query($sql_delete);	  	
        
	  
 } 
?>