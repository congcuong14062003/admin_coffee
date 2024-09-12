<?php
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
require_once('../../config/cnDB.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Quản lý nhân viên</li>
            <li class="breadcrumb-item active">Thêm nhân viên</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm nhân viên</h4>
                    </div>
                    <div class="card-body">
                        <form action="./createEmployeeAction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input required type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email nhân viên</label>
                                <input required type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input required type="text" class="form-control" name="password" val>
                            </div>
                            <div class="form-group">
                                <label for="role">Quyền</label><br>
                                <input type="radio" id="admin" name="role" value="admin" required>
                                <label for="admin">Admin</label><br>
                                <input type="radio" id="employee" name="role" value="employee" required>
                                <label for="employee">Nhân viên</label>
                            </div>
                            <button name="add_employee" class="btn btn-primary mt-2" type="submit">Thêm nhân
                                viên</button>
                            <a href="listEmployee.php" class="btn btn-danger mt-2">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const inputImg = document.querySelector("input#image_prod");
        inputImg.addEventListener("change", function (e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector("img.preview").src = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                document.querySelector("img.preview").src = "https://icons-for-free.com/iconfiles/png/512/upload+export+upload+upload+to+cloud+icon-1320165659391053645.png"; // Xóa hình ảnh xem trước nếu không có tệp được chọn
            }
        });
    </script>
    <?php include('../includes/footer.php');
    ?>
</body>
</html>