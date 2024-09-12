<?php
session_start();
require_once('../../config/cnDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_GET['user_id']; // Lấy user_id từ URL
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    // Cập nhật thông tin nhân viên
    $sqlUpdate = "UPDATE users SET username='$username', email='$email', password='$password', role='$role' WHERE user_id=$user_id";

    if (mysqli_query($connection, $sqlUpdate)) {
        $_SESSION['success'] = "Cập nhật thành công!";
        header("Location: listEmployee.php");
        exit();
    } else {
        $_SESSION['error'] = "Cập nhật không thành công: " . mysqli_error($connection);
        header("Location: ./editProduct.php?user_id=$user_id");
        exit();
    }
} else {
    // Nếu không phải là POST request, chuyển hướng về trang danh sách
    header("Location: listEmployee.php");
    exit();
}
?>