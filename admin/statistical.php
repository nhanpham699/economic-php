<?php
  if(isset($_GET['sta'])){
  	$sta = $_GET['sta'];
  }else{
  	$sta = "";
  }
?>
<!DOCTYPE HTML>
<html>
<head>  
<style type="text/css">
	table#revenue tr td, table#revenue tr th{
          padding: 20px;
 	}
 	table#revenue{
 		margin-top:15px; 
 	}
 	ul.revenue{
	margin: 0;
	padding: 0;
	margin-left: -23px;
	}
	ul.revenue li{
	list-style: none;
	float: left;
	}
	ul.revenue li a{
	cursor: pointer;	
	text-decoration: none;
	color: black;
	font-weight: bold;
	height: 50px;
	line-height: 50px;
	padding: 3px 15px;
	border: solid 1px black;
	}
	ul.revenue li a:hover{
	background: black;
	color: white;
	transition: ease-in 0.3s;
	-moz-transition: ease-in 0.3s;
	-webkit-transition: ease-in 0.3s
	}
</style>
</head>
<body>
<ul class="revenue">
	<li><a href="admin.php?view=statistical&sta=month">Tháng</a></li>
	<li><a href="admin.php?view=statistical&sta=year">Năm</a></li>
</ul>	
<br>
<div id="statisticalbyyear">	
	<?php
	    if($sta == "month"){ 
	     include ("statisticalbymonth.php");
	    }else if($sta == "year"){ 
	     include ("statisticalbyyear.php");
	    }
	?>
</div>	
</body>
</html>       