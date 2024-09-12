<?php
require_once('../../config/cnDB.php');
$pid = $_REQUEST['ProdId'];
$pname = $_POST["pname"];
$pquantity = $_POST["pquantity"];
$pprice = $_POST["pprice"];
$ppricesale = $_POST["ppricesale"];
$pdesc = $_POST["pdesc"];
$CateName = $_POST["slCid"];
$sqlProd = "SELECT * from  product where product.ProdId = $pid";
$product = mysqli_query($connection, $sqlProd);
$dataProduct = mysqli_fetch_assoc($product);
// ảnh đại diện
if (isset($_FILES['pimage'])) {
    $file = $_FILES['pimage'];
    $file_name = $file['name'];
    if (empty($file_name)) {
        $file_name = $dataProduct['ProdImage'];
    } else {
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' ||  $file['type'] == 'image/png') {
            move_uploaded_file($file['tmp_name'], '../../images/' . $file_name);
        } else {
            echo "Không đúng định dạng";
            $file_name = '';
        }
    }
}
$sqlupdate = "update Product set ProdName = '$pname', ProdDescription = '$pdesc', ProdImage = '$file_name', ProdPrice = '$pprice', ProdPriceSale = '$ppricesale', ProdQuantity = '$pquantity', ProdCategoryName = '$CateName' where ProdId = $pid";
$query = mysqli_query($connection, $sqlupdate);
if ($query) {
    echo "Thêm sản phẩm thành công";
    header("Location: ./myProduct.php");
} else {
    echo "Lỗi thêm sản phẩm";
}
