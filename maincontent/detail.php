 <style type="text/css">
   table#detail tr{
     border-bottom: 1px solid silver;
   }
   div.cot1 button{
      width: 150px;
      margin-left: 45px;
      margin-top: 10px;  
   }
   td.cot2{
     width: 100%;
   }
   #cot1{
    width: 50%;
    padding: 0
   }
   #tieude{
    color: brown;
    font-size: 30px;
   }
 </style>
 <?php 

       if(isset($_GET['id'])){
       	  $id = $_GET['id'];   	  
          $sql = "SELECT * FROM products where id= '$id'" ;
          $result = $connect->query($sql);
          $row = mysqli_fetch_row($result);      
     }
 ?> 
    
    <table id="detail">
         <tr id="tieude"><td colspan="2"> <?php echo $row[1];?> </td></tr>
         <tr>
         	 <td id="cot1" rowspan="5">
               <div id="img-container"> 
                  <img id="anhsp" style=" margin-left:3%; width: 220px; height: 170px" src="<?php echo $row[4];?>">
               </div>  
               <br>
               <div class="cot1"><i> <button type="button" class="btn btn-danger" 
                <?php
                   if(!isset($_SESSION['username'])){?>
                      onclick="dontaddCart()"
                   <?php }else if($row[3] <=0){?> 
                      onclick="outofstock()" 
                   <?php }else{ ?> 
                      onclick="addCart('<?php echo $row[0];?>')"<?php } ?> > Thêm vào giỏ </button> </i></div>
           </td>
         	 <td class="cot2"><i><b>Tên sản phẩm: </b><span id="tensp"><?php echo $row[1];?> </span></i></td>
         </tr>
         <tr>
         	 <td class="cot2"><i><b>Số lượng:</b></i>&nbsp;
         	 	<button onclick="downNum()" id="Quantum">-</button><input disabled min=1 value="1" id="slg"><button onclick="upNum()">+</button> 
         	 </td>
         </tr> 
         <tr>
           <td class="cot2">
               <i><b>Màu:</b> <span id="mausp"><?php echo $row[6];?></span></i>           
           </td>
         </tr>
         <tr>
           <td class="cot2">
               <?php if($row[5] == 'b'){ ?> 
                   <i><b>Size:</b> <input disabled style="border: none; background: none;" id="size" value="free"></i> 
               <?php }else if($row[5] == 'ta'){?>
                    <i><b>Size:</b>&nbsp;
                    <span id="size">  
                    <label> S </label>
                      <input type="radio" name="radio" value="S">  
                    <label> M </label>
                      <input type="radio" name="radio" checked="checked" value="M">
                    <label> L </label>
                      <input type="radio" name="radio" value="L">
                    <label> XL </label>
                      <input type="radio" name="radio" value="XL"> </span></i>

               <?php }else{ ?> 
                   <i><b>Size:</b></i>&nbsp; 
                   <button onclick="downSize()" id="Quantum">-</button><input disabled min=38 max=43 value="38" id="size"><button onclick="upSize()">+</button>
               <?php } ?> 
           </td>
         </tr>
         <tr>
         	 <td class="cot2"><i><b>Đơn giá:</b><span id="giasp" > <?php echo number_format($row[2],0,'','.');?>đ</span></i></td>
         </tr> 
         
    </table>



    
