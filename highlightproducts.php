<?php 
	 $sql_highlight = "SELECT products.image, products.id, products.name,products.price, sum(d.quantum) as sum 
	 FROM detailorders as d 
     INNER JOIN products ON products.id=d.idproduct 
     INNER JOIN orders ON d.idorders = orders.id 
	 where status !=3
	 GROUP BY NAME 
	 ORDER BY `sum` DESC
	 LIMIT 10";
	 $result_highlight = $connect->query($sql_highlight);
	 $stt = 1;
	 while($row = $result_highlight->fetch_assoc()){
 ?>
	 <div class="item itemHL"> 
	   <a style="color: black; text-decoration: none;" href="index.php?view=detail&id=<?php echo $row['id']; ?>"> 	
	    <img style="width: 160px; height: 140px; margin-left: 4%" src="<?php echo $row['image']; ?>"> 
	    <p> <b><?php echo '&emsp;' . $row['name'];  ?></b> </p> 
	    <div class="tien"> <?php echo number_format($row['price'], 0, '','.') .'đ'; ?></div> 
	    <a id="ap" href="index.php?view=detail&id=<?php echo $row['id']; ?>">&emsp;<button type="button" class="btn btn-danger">Mua ngay</button></a>
	    <span id="sttHL"><?php echo $stt;?></span>
	   </a>
	  </div>
	<?php 
     	$stt++;}
    ?> 