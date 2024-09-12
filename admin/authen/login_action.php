<?php 
session_start();
require_once("../../config/cnDB.php");

if(!empty($_POST['UserName']) && !empty($_POST['UserPassword'])) {
    $UserName = $_POST['UserName'];
    $password = $_POST['UserPassword'];
    $sql = "SELECT * FROM users where username = '$UserName' and password = '$password' and role = 'admin'";
    $user = mysqli_query($connection,$sql) or die ($connection->error);
    if($user && mysqli_num_rows($user) == 1) {
        $userData = mysqli_fetch_assoc($user);
        $account_name_user = $userData['username'];
        $id_user = $userData['UserId'];
        $_SESSION['username'] = $account_name_user;
        echo $_SESSION['username'];
        $_SESSION['loggedin'] = true;//đăng nhập thành công
        $_SESSION['UserId'] = $id_user;
        $_SESSION["current_user"] = $userData;
        header('Location: ../home/index.php');
        exit();
    } else {
        header('Location: ./login.php');
        $_SESSION["error_login"] = "Tên đăng nhập hoặc mật khẩu không chính xác";
        // echo "Tên đăng nhập hoặc mật khẩu không chính xác";
    } 
} else { 
    $_SESSION["error_login"] = "Vui lòng nhập tên người dùng và mật khẩu";
    // echo "Vui lòng nhập tên người dùng và mật khẩu";
}
?>