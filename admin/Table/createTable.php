<?php
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
require_once('../../config/cnDB.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Bàn Mới</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Quản lý bàn ngồi</li>
            <li class="breadcrumb-item active">Thêm bàn</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm bàn</h4>
                    </div>
                    <div class="card-body">
                        <form action="./createTableAction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên bàn</label>
                                <input required type="text" class="form-control" name="name_table">
                            </div>
                            <div class="form-group">
                                <label>Số chỗ ngồi</label>
                                <input required type="number" class="form-control" name="table_number">
                            </div>
                            <button name="add_table" class="btn btn-primary mt-2" type="submit">Đăng bàn</button>
                            <a href="listTable.php" class="btn btn-danger mt-2">Quay lại</a>
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