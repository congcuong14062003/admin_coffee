<?php
session_start();
require_once('../../config/cnDB.php');

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']); // Lấy user_id từ URL và chuyển đổi sang kiểu số nguyên

    // Câu lệnh xóa nhân viên
    $sqlDelete = "DELETE FROM users WHERE user_id = $user_id";

    if (mysqli_query($connection, $sqlDelete)) {
        $_SESSION['success'] = "Xóa nhân viên thành công!";
    } else {
        $_SESSION['error'] = "Xóa nhân viên không thành công: " . mysqli_error($connection);
    }
} else {
    $_SESSION['error'] = "Không có ID nhân viên được cung cấp.";
}

// Chuyển hướng về trang danh sách nhân viên
header("Location: ./listEmployee.php");
exit();
?>