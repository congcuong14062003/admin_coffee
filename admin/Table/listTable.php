<?php
include('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
?>
<!-- container-Table -->
<div class="container-fluid px-4">
    <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item active">Quản lý bàn ngồi</li>
        <li class="breadcrumb-item active">Danh sách bàn</li>
    </ol>
    <div class="Prod">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách bàn</h4>
                    <a href="./createTable.php" class="btn btn-primary float-end">
                        <i class="fa-solid fa-plus" style="margin-right: 5px;"></i>Thêm bàn
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên bàn</th>
                                <th scope="col">Số chỗ ngồi</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "Select * from tables";
                            $result = $connection->query($sql);
                            if ($result->num_rows > 0) {
                                while ($Prod = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?= $Prod['table_id']; ?></td>
                                        <td><?= $Prod['name_table']; ?></td>
                                        <td><?= $Prod["table_number"] ?></td>
                                        <td><?= $Prod["status"] ?></td>
                                        <td>
                                            <a href="./editTable.php?table_id=<?= $Prod['table_id'] ?>"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>Sửa
                                            </a>
                                        </td>


                                        <td>
                                            <a href="deleteTableAction.php?table_id=<?php echo $Prod["table_id"]; ?>"
                                                class="btn btn-danger action_delete" value="<?= $Prod['table_id']; ?>"><i
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

<?php
include_once('../includes/footer.php')
    ?>
</body>

</html>