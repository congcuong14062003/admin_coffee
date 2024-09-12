<?php
session_start();
require_once('../../config/cnDB.php');
// Kiểm tra nếu có ID của bàn được gửi từ URL
if (isset($_GET['table_id']) && is_numeric($_GET['table_id'])) {
    $table_id = (int)$_GET['table_id'];

    // Xóa bàn từ cơ sở dữ liệu
    $sqlDelete = "DELETE FROM Tables WHERE table_id = $table_id";

    if (mysqli_query($connection, $sqlDelete)) {
        $_SESSION['success'] = "Xóa bàn thành công!";
    } else {
        $_SESSION['error'] = "Có lỗi xảy ra khi xóa bàn: " . mysqli_error($connection);
    }

    // Chuyển hướng về trang danh sách bàn
    header("Location: ./listTable.php");
    exit();
} else {
    // Nếu không có ID hợp lệ, chuyển hướng về trang danh sách bàn
    $_SESSION['error'] = "ID bàn không hợp lệ.";
    header("Location: ./listTable.php");
    exit();
}
?>
