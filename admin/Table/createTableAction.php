<?php 
session_start();
require_once('../../config/cnDB.php');
if (isset($_POST['slCid'])) {
    $catename = $_POST["slCid"];
    $userid = $_SESSION["UserId"];
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $pquantity = $_POST['pquantity'];
    $pprice = $_POST['pprice'];
    $ppricesale = $_POST['ppricesale'];
    // var_dump($_FILES);
    if (isset($_FILES['pimage'])) {
        $file = $_FILES['pimage'];
        $file_name = $file['name'];
        if(strpos($file['type'], 'image/') === 0) {
            move_uploaded_file($file['tmp_name'], '../../images/' . $file_name);
            $sqlinsert = "insert into Product(ProdName, ProdDescription, ProdImage, ProdPrice, ProdPriceSale, ProdQuantity,ProdCategoryName, UserId) values('" . $pname . "','" . $pdesc . "','" . $file_name . "'," . $pprice . "," . $ppricesale . "," . $pquantity . ",'".$catename."'," . $userid . ")";
            $query = mysqli_query($connection, $sqlinsert);
           
            if ($query) {
                echo "Thêm sản phẩm thành công";
                header("Location: ./myProduct.php");
            } else {
                echo "Lỗi thêm sản phẩm";
            }
        } else {
            echo"Không đúng định dạng";
            $file_name = '';
        }
    }

   
}
?>
