<?php
  if(!isset($_SESSION)){
     session_start();
    }
       if(!isset($_SESSION['Username'])){
       	header('location: admin.php?view=product');
       }
     include 'uploadfile.php';
       if(isset($_POST['add_submit'])){  
          $name= $_POST['nameproduct'];
          $color= $_POST['colorproduct'];
          $quantum = $_POST['quantumproduct'];
          $idKind = $_POST['idKindproduct'];
          $price= $_POST['priceproduct'];
          $file1 = substr($target_file,1);
       $add = "INSERT INTO products(name, price, quantum, image, idKind, color) values('$name','$price','$quantum','$file1','$idKind','$color')";
       $connect->query($add);
     header('location: admin.php?view=products'); 
}  


?>
<h2 style="margin-left: 41.7%" class="tt"> Thêm sản phẩm </h2>
<div class="aau">
   <form method="POST" enctype="multipart/form-data" >
    <table class="table1">
        <tr>
          <td><label for="nameproduct"> Tên sản phẩm: </label></td>
          <td><input type="text" name="nameproduct" > </td>
        </tr>
        <tr>
          <td><label for="colorproduct">Màu sản phẩm: </label></td>
          <td><input type="text" name="colorproduct" class="colorproduct"></td>
        </tr>
        <tr>
          <td><label for="priceproduct"> Giá sản phẩm: </label></td>
          <td><input type="text" name="priceproduct"></br></td>
        </tr>
        <tr>
          <td><label for="idKindproduct"> Id loại sản phẩm: </label></td>
          <td><input type="text" name="idKindproduct" ></br></td>
        </tr>
        <tr>
          <td><label for="quantumproduct"> Số lượng: </label></td>
          <td><input type="text" name="quantumproduct"></br></td>
        </tr>
        <tr>
          <td><label for="image"> Ảnh sản phẩm: </label></td>
          <td>
              <input type="file" name="fileUpload" id="fileUpload"> </td> 
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="add_submit" value="Thêm sản phẩm">
          </td>
        </tr>
    </table>
  </form>
 </div> 