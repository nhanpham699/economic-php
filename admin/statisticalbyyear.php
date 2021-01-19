<?php
	$sql_chart ="SELECT YEAR(dateproducts) as year ,sum(detailorders.price*detailorders.quantum) as quantum FROM detailorders inner join orders on detailorders.idorders = orders.id  group by YEAR(dateproducts)";
	$result_chart = $connect->query($sql_chart);
	$dataPoints = array(); 
	while ($row = $result_chart->fetch_assoc()) {
		array_push($dataPoints,array("label"=> 'Năm '.$row["year"], "y"=> $row['quantum']));
	}
	if(isset($_GET["year"])){
		$year = $_GET["year"];
	}else{
		$year = date('Y');
	}

?>
<div id="chartContainer" style="height: 370px; margin:0 auto;width: 50%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<div style="margin: 2% 35%;">
	<select id="year" onchange="processYear()">
		<?php 
           $yearArray = array();
		   for($i=0; $i<=4; $i++){
                array_push($yearArray,date('Y', strtotime('-'.$i.' years')));    
           }
           foreach ($yearArray as $value) {
	    ?>
			<option 
			   <?php if($value == $year){?>
			      selected="selected"
			   <?php } ?>
			      value="<?php echo $value ?>">Năm <?php echo $value ?>      	
			</option>
	    <?php } ?>
	</select>
	<table border="1px" id="revenue">
		<tr>
			<th>Tên sản phẩm</th>
			<th>Số lượng</th>
			<th>Doanh thu</th>
		</tr>
		<?php
		   $sql_revenue = "SELECT name, sum(quantum) as quantity ,sum(price*quantum) as revenue 
		   FROM detailorders inner join orders 
		   on detailorders.idorders = orders.id 
		   where YEAR(dateproducts) = '$year'
		   group by name";
		   $result_revenue = $connect->query($sql_revenue);
		   $total_quantity = 0;
		   $total_price = 0;
	       while($row = $result_revenue->fetch_assoc()){ ?>
	            <tr>
	            	<td><?php echo $row["name"]; ?></td>
	            	<td><?php echo $row["quantity"]; $total_quantity+=$row['quantity']; ?></td>
	            	<td><?php echo number_format($row["revenue"],0,'','.'); $total_price+=$row['revenue']; ?>đ</td>
	            </tr>  	 
	        <?php
	          }   
		    ?>
	</table>
	<br>
	<p><b>TỔNG SỐ LƯỢNG SẢN PHẨM BÁN ĐƯỢC:</b> <?php echo $total_quantity; ?></p>
	<p><b>TỔNG DOANH THU:</b> <?php echo number_format($total_price,0,'','.'); ?>đ</p>
	</div>	
	<script type="text/javascript">
		window.onload = function () {
 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			theme: "light1", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Thống kê doanh thu qua các năm"
			},
			data: [{
				type: "column", //change type to bar, line, area, pie, etc
				//indexLabel: "{y}", //Shows y value on all Data Points
				indexLabelFontColor: "#5A5757",
				indexLabelPlacement: "outside",   
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();	 
		}

		function processYear(){
	        var a = document.getElementById("year");
	        var year = a.options[a.selectedIndex].value;
	        window.location.href ="admin.php?view=statistical&sta=year&year="+year;
		}
	</script>