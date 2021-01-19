<?php 
    if($t == 'product'){
      include("maincontent/product.php");   
    }else if(isset($_POST['search'])){
      include("search.php");
     }else if(isset($_POST['checkbox'])){
      include("filter.php");
     }else if($t == 'detailOrders'){
       include ("maincontent/detailOrders.php");
     }else if($t == 'filter'){
       include ("filter.php");
     }else if($t == 'allproducts'){
      include ("maintop/Allproducts.php");
     }else{   
          include ("maincontent/imageinhome.php");
     }
 ?>
                               
            
            
            
         
            
	    