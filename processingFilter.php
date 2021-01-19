<?php 
       session_start();
       $_SESSION["brand_price"] = [];
	   if(isset($_POST['brand_color'])){
	         $_SESSION['brand_color'] = $_POST['brand_color'];
	    }else if ($_POST["brand_color"] == []) {
	    	 unset($_SESSION["brand_color"]);
	    }   
	   if(isset($_POST['min_price'])){
	        array_push($_SESSION["brand_price"],$_POST['min_price']); 
	     }else if($_POST["min_price"] == []){
            unset($_SESSION['brand_price']); 
	     }
	    if(isset($_POST['max_price'])){
	        array_push($_SESSION["brand_price"],$_POST['max_price']); 
	     }else if($_POST["max_price"] == []){
            unset($_SESSION['brand_price']); 
	     } 
	    print_r($_SESSION["brand_price"]); 
?>
   