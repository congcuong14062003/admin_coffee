<?php
session_start();
require_once('../../config/cnDB.php');

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Câu lệnh SQL để xóa sản phẩm
    $sqlDelete = "DELETE FROM Products WHERE product_id = $product_id";

    if (mysqli_query($connection, $sqlDelete)) {
        $_SESSION['success'] = "Xóa sản phẩm thành công!";
    } else {
        $_SESSION['error'] = "Lỗi khi xóa sản phẩm: " . mysqli_error($connection);
    }
} else {
    $_SESSION['error'] = "ID sản phẩm không hợp lệ.";
}

// Chuyển hướng về trang danh sách sản phẩm
header("Location: ./listProduct.php");
exit();
?>