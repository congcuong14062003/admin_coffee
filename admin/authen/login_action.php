<?php 
session_start();
require_once("../../config/cnDB.php");

if(!empty($_POST['Email']) && !empty($_POST['UserPassword'])) {
    $Email = $_POST['Email'];
    $password = $_POST['UserPassword'];
    $sql = "SELECT * FROM users where email = '$Email' and password = '$password' and role = 'admin'";
    $user = mysqli_query($connection,$sql) or die ($connection->error);
    if($user && mysqli_num_rows($user) == 1) {
        $userData = mysqli_fetch_assoc($user);
        $id_user = $userData['user_id'];
        $_SESSION['loggedin'] = true;//đăng nhập thành công
        $_SESSION['UserId'] = $id_user;
        $_SESSION['username'] = $userData['username'];
        $_SESSION["current_user"] = $userData;
        header('Location: ../home/index.php');
        exit();
    } else {
        header('Location: ./login.php');
        $_SESSION["error_login"] = "Email hoặc mật khẩu không chính xác";
        // echo "Tên đăng nhập hoặc mật khẩu không chính xác";
    } 
} else { 
    $_SESSION["error_login"] = "Vui lòng nhập email và mật khẩu";
    // echo "Vui lòng nhập tên người dùng và mật khẩu";
}
?>