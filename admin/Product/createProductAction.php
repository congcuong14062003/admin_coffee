<?php 
session_start();
require_once('../../config/cnDB.php');
    $name = $_POST['name'];
    $price = $_POST['price'];
    // var_dump($_FILES);
    if (isset($_FILES['image_url'])) {
        $file = $_FILES['image_url'];
        $file_name = $file['name'];
        if(strpos($file['type'], 'image/') === 0) {
            move_uploaded_file($file['tmp_name'], '../../images/' . $file_name);
            $sqlinsert = "INSERT INTO Products (name, price, image_url) VALUES ('$name', '$price', '$file_name')";
            $query = mysqli_query($connection, $sqlinsert);
           
            if ($query) {
                echo "Thêm sản phẩm thành công";
                header("Location: ./listProduct.php");
            } else {
                echo "Lỗi thêm sản phẩm";
            }
        } else {
            echo"Không đúng định dạng";
            $file_name = '';
        }
    }

   
?>
