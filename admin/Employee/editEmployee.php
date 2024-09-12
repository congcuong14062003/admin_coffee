<?php
require_once('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
$user_id = $_REQUEST['user_id'];

// Lấy thông tin nhân viên
$sqlProd = "SELECT * FROM users where user_id = $user_id";
$product = mysqli_query($connection, $sqlProd);
$dataProduct = mysqli_fetch_assoc($product);




?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa nhân viên</title>
    <link rel="stylesheet" href="./editProduct.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Quản lý nhân viên</li>
            <li class="breadcrumb-item active">Sửa nhân viên</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa nhân viên</h4>
                    </div>
                    <div class="card-body">
                        <form action="./editEmployeeAction.php?user_id=<?php echo $user_id ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Tên nhân viên</label>
                                <input required type="text" class="form-control" name="username"
                                    value="<?php echo $dataProduct['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email nhân viên</label>
                                <input required type="text" class="form-control" name="email"
                                    value="<?php echo $dataProduct['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input required type="text" class="form-control" name="password"
                                    value="<?php echo $dataProduct['password'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Quyền</label><br>
                                <input type="radio" id="admin" name="role" value="admin" 
                                    <?php echo ($dataProduct['role'] == 'admin') ? 'checked' : ''; ?> required>
                                <label for="admin">Admin</label><br>
                                <input type="radio" id="employee" name="role" value="employee" 
                                    <?php echo ($dataProduct['role'] == 'employee') ? 'checked' : ''; ?> required>
                                <label for="employee">Nhân viên</label>
                            </div>
                            <div class="form-group">
                                <button name="add_product" type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                                <a href="listEmployee.php" class="btn btn-danger mt-2">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php include('../includes/footer.php');
    ?>
</body>

</html>