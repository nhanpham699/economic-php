<?php 
   if(!isset($_SESSION)){
     session_start();
    }
    if(!isset($_SESSION['Username'])){
             header('location: loginA.php');
       }
     include 'uploadfile.php';

     if(isset($_GET['idsp'])){
       $idsp = $_GET['idsp'];
       }else{
         $idsp ='';
       }
       if($idsp ==''){
         header('location: admin.php?view=products');
       }

       if(isset($_POST['update_submit'])){
          $name= $_POST['nameproduct'];
          $color= $_POST['colorproduct'];
          $quantum = $_POST['quantumproduct'];
          $idKind = $_POST['idKindproduct'];
          $price= $_POST['priceproduct'];
          $file = $_POST['file'];
          $file1 = substr($target_file,1);
             if($target_file == '../uploads/'){
                 $sql_update = "UPDATE products SET name='$name', price='$price', image='$file', color='$color', idKind='$idKind', quantum='$quantum' where id='$idsp'" ;
               }else{
                   $sql_update = "UPDATE products SET name='$name', price='$price', image= '$file1', color='$color', idKind='$idKind', quantum='$quantum'  where id='$idsp'" ;          

                   }
       $connect->query($sql_update);
       header('location: admin.php?view=products');
    }  
    
     $sql_add = "SELECT * FROM products where id = '$idsp'";
     $result_add = $connect->query($sql_add);
?>
<h2 class="tt"> Sửa thông tin sản phẩm </h2>
<div class="aau">
   <form method="POST" enctype="multipart/form-data" >
    <table class="table1">
      <?php while($row = $result_add->fetch_assoc()){ ?>
        <tr>
          <td><label for="nameproduct"> Tên sản phẩm: </label></td>
          <td><input type="text" value="<?php echo $row['name'];?>" name="nameproduct" > </td>
        </tr>
        <tr>
          <td><label for="colorproduct">Màu sản phẩm: </label></td>
          <td><input class="colorproduct" value="<?php echo $row['color']; ?>"  type="text" name="colorproduct"></td>
        </tr>
        <tr>
          <td><label for="priceproduct"> Giá sản phẩm: </label></td>
          <td><input type="text" value="<?php echo $row['price'];?>" name="priceproduct"></br></td>
        </tr>
        <tr>
          <td><label for="idKindproduct"> Id loại sản phẩm: </label></td>
          <td><input type="text" value="<?php echo $row['idKind'];?>" name="idKindproduct"></br></td>
        </tr>
        <tr>
          <td><label for="quantumproduct"> Số lượng: </label></td>
          <td><input type="text" value="<?php echo $row['quantum'];?>" name="quantumproduct"></br></td>
        </tr>
        <tr>
          <td><label for="image"> Ảnh sản phẩm: </label></td>
          <td>
              <input type="text" style="display: none;" name="file" value="<?php echo $row['image']; ?>">
              <input type="file" name="fileUpload" id="fileUpload"> </td>
               <p style="color: red" >
      <?php
              if(isset($error['fileUpload'])){
               echo "<prev>";
               echo $error['fileUpload'];
               echo "<prev>";
              }
      ?>
     </p> 
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="update_submit" value="Hoàn tất sửa">
          </td>
        </tr>
      <?php
        }
      ?>
    </table>
  </form>
 </div> 
