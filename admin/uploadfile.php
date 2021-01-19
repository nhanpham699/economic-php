<?php
      if($_SERVER['REQUEST_METHOD'] == "POST"){
          // print_r($_FILES);
        $error = array();
        $target_dir = "../uploads/";
        $target_file = $target_dir.basename($_FILES["fileUpload"]["name"]);
        // kiểm tra kiêu file hợp lệ
        if(file_exists($target_file)){
             $error['fileUpload'] = "";
         }
        $type_file = pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION);
        $type_file_allow = array('png', 'jpg', 'jpeg', 'gif');

         if(!in_array(strtolower($type_file), $type_file_allow)){
         $error["fileUpload"] = "Vui lòng chọn hình ảnh!!";
        }
         $size_file = $_FILES['fileUpload']['size'];
         if($size_file > 5242880){
             $error["fileUpload"] = "Vui lòng chọn file không quá 5MB";
         }
        if(empty($error)){
          if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)){
            // echo "Bạn đã upload thành công!!";
            $flag = true;
          }else{
            $flag = false;
            // echo "File bạn upload gặp lỗi";
          }
        }

    }
    ?>