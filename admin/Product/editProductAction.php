<?php
require_once('../../config/cnDB.php');

// Kiểm tra xem có `product_id` không
$pid = isset($_GET['ProdId']) ? $_GET['ProdId'] : 0;

if (empty($pid) || !is_numeric($pid)) {
    die("ID sản phẩm không hợp lệ.");
}

$name = mysqli_real_escape_string($connection, $_POST["name"]);
$price = mysqli_real_escape_string($connection, $_POST["price"]);

// Lấy thông tin sản phẩm cũ từ database
$sqlProd = "SELECT * FROM Products WHERE product_id = $pid";
$product = mysqli_query($connection, $sqlProd);

if (!$product) {
    die("Lỗi truy vấn sản phẩm: " . mysqli_error($connection));
}

$dataProduct = mysqli_fetch_assoc($product);

// Xử lý ảnh đại diện
if (isset($_FILES['image_url'])) {
    $file = $_FILES['image_url'];
    $file_name = $file['name'];

    if (empty($file_name)) {
        // Nếu không có ảnh mới, giữ nguyên ảnh cũ
        $file_name = $dataProduct['image_url'];
    } else {
        // Kiểm tra định dạng file
        if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png') {
            move_uploaded_file($file['tmp_name'], '../../images/' . $file_name);
        } else {
            die("Không đúng định dạng hình ảnh. Chỉ chấp nhận jpg, jpeg, png.");
        }
    }
}

// Cập nhật thông tin sản phẩm trong database
$sqlUpdate = "UPDATE Products SET name = '$name', image_url = '$file_name', price = '$price' WHERE product_id = $pid";
$query = mysqli_query($connection, $sqlUpdate);

if ($query) {
    echo "Sửa sản phẩm thành công";
    header("Location: ./listProduct.php");
} else {
    die("Lỗi sửa sản phẩm: " . mysqli_error($connection));
}
?>
