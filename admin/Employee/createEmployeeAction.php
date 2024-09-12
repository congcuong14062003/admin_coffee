<?php
session_start();
require_once('../../config/cnDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    // Câu lệnh thêm nhân viên
    $sqlInsert = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if (mysqli_query($connection, $sqlInsert)) {
        $_SESSION['success'] = "Thêm nhân viên thành công!";
        header("Location: ./listEmployee.php");
        exit();
    } else {
        $_SESSION['error'] = "Thêm nhân viên không thành công: " . mysqli_error($connection);
        header("Location: ./createEmployee.php");
        exit();
    }
} else {
    // Nếu không phải là POST request, chuyển hướng về trang thêm nhân viên
    header("Location: ./createEmployee.php");
    exit();
}
?>