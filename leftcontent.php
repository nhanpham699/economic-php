<?php
    $array_color = array('đen','trắng','xám','nâu','cam','lục','xanh','bạc');
 ?>
<br> 
<div>
  <h2> Giá </h2>
  <input type="hidden" id="hidden_minimum_price" value="300000">
  <input type="hidden" id="hidden_maximum_price" value="9100000">
  <p id="price_show">300.000đ - 9.100.000đ </p>
  <div id="price_range"></div>
 </div>
<br>
<br> 
<h2> Màu</h2> 
<div onchange="filter()" id="filter">  
</label>
<?php 
    foreach ($array_color as $color) {
 ?>
<label class="container"><?php echo $color ?>
  <input class="brand_color" name="filter[]" value="<?php echo $color ?>" type="checkbox" >
  <span class="checkmark"></span>
</label>
<?php } ?>
</div>