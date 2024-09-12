<?php
session_start();
require_once('../../config/cnDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $name_table = mysqli_real_escape_string($connection, $_POST['name_table']);
    $table_number = (int)$_POST['table_number'];

    // Kiểm tra dữ liệu đầu vào
    if (empty($name_table) || $table_number <= 0) {
        $_SESSION['error'] = "Vui lòng nhập thông tin hợp lệ.";
        header("Location: ./createTable.php");
        exit();
    }

    // Thêm bàn mới vào database
    $sqlInsert = "INSERT INTO Tables (name_table, table_number, number_customer_id, status) 
                  VALUES ('$name_table', $table_number, 0, 'free')";

    if (mysqli_query($connection, $sqlInsert)) {
        $_SESSION['success'] = "Thêm bàn thành công!";
        header("Location: ./listTable.php");
        exit();
    } else {
        $_SESSION['error'] = "Có lỗi xảy ra khi thêm bàn: " . mysqli_error($connection);
        header("Location: ./createTable.php");
        exit();
    }
} else {
    // Nếu không phải POST request, chuyển hướng về trang thêm bàn
    header("Location: ./createTable.php");
    exit();
}
?>
