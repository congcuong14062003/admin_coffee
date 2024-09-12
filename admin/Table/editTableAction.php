<?php
session_start();
require_once('../../config/cnDB.php');

// Kiểm tra xem có `table_id` không
if (isset($_GET['table_id']) && is_numeric($_GET['table_id'])) {
    $table_id = (int)$_GET['table_id'];

    // Kiểm tra xem form đã được gửi chưa
    if (isset($_POST['name_table']) && isset($_POST['table_number'])) {
        $name_table = mysqli_real_escape_string($connection, $_POST['name_table']);
        $table_number = mysqli_real_escape_string($connection, $_POST['table_number']);

        // Cập nhật thông tin bàn trong database
        $sqlUpdate = "UPDATE Tables SET name_table = '$name_table', table_number = '$table_number' WHERE table_id = $table_id";

        if (mysqli_query($connection, $sqlUpdate)) {
            $_SESSION['success'] = "Cập nhật bàn thành công!";
        } else {
            $_SESSION['error'] = "Lỗi cập nhật bàn: " . mysqli_error($connection);
        }
    } else {
        $_SESSION['error'] = "Dữ liệu không hợp lệ.";
    }
} else {
    $_SESSION['error'] = "ID bàn không hợp lệ.";
}

// Chuyển hướng về trang danh sách bàn
header("Location: ./listTable.php");
exit();
?>
