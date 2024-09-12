<?php
include('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
?>
<!-- container-product -->
<div class="container-fluid px-4">
    <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item active">Quản lý nhân viên</li>
        <li class="breadcrumb-item active">Danh sách nhân viên</li>
    </ol>
    <div class="Prod">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách nhân viên</h4>
                    <a href="./createEmployee.php" class="btn btn-primary float-end">
                        <i class="fa-solid fa-plus" style="margin-right: 5px;"></i>Thêm nhân viên
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "Select * from users where user_id != '$user_id' ORDER BY created_at DESC";
                            $result = $connection->query($sql);
                            if ($result->num_rows > 0) {
                                while ($Prod = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $Prod['user_id']; ?></td>
                                        <td><?= $Prod['username']; ?></td>
                                        <td><?= $Prod['email'] ?></td>
                                        <td><?= $Prod['password'] ?></td>
                                        <td><?= $Prod["role"] ?></td>
                                        <td><?= $Prod["created_at"] ?></td>
                                        <td>
                                            <a href="./editEmployee.php?user_id=<?= $Prod['user_id'] ?>"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>Sửa
                                            </a>
                                        </td>


                                        <td>
                                            <a href="deleteEmployeeAction.php?user_id=<?php echo $Prod["user_id"]; ?>"
                                                class="btn btn-danger" value="<?= $Prod['user_id']; ?>"><i
                                                    class="fa-solid fa-trash" style="margin-right: 5px;"></i>Xóa
                                            </a>
                                        </td>

                                    <?php } ?>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        <?php if (isset($_SESSION['success'])): ?>
            toastr.success("<?php echo $_SESSION['success']; ?>");
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    });
</script>
<?php
include_once('../includes/footer.php')
    ?>

</body>

</html>