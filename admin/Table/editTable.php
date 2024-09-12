<?php
require_once('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
$table_id = $_REQUEST['table_id'];

// Lấy thông tin bàn
$sqlProd = "SELECT * FROM Tables where table_id = $table_id";
$tables = mysqli_query($connection, $sqlProd);
$datatables = mysqli_fetch_assoc($tables);




?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa bàn</title>
    <link rel="stylesheet" href="./edittables.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Quản lý bàn ngồi</li>
            <li class="breadcrumb-item active">Sửa bàn</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa bàn</h4>
                    </div>
                    <div class="card-body">
                        <form action="./editTableAction.php?table_id=<?php echo $table_id ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="tables_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name_table">Tên bàn</label>
                                <input required type="text" class="form-control" name="name_table" value="<?php echo $datatables['name_table'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="table_number">Số chỗ ngồi</label>
                                <input required type="number" class="form-control" name="table_number" value="<?php echo $datatables['table_number'] ?>">
                            </div>
                            <div class="form-group">
                                <button name="add_tables" type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                                <a href="listTable.php" class="btn btn-danger mt-2">Quay lại</a>
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