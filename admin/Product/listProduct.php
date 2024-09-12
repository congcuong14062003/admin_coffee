<?php
include('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
?>
<!-- container-product -->
<div class="container-fluid px-4">
    <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item active">Sản phẩm</li>
        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
    </ol>
    <div class="Prod">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách sản phẩm</h4>
                    <a href="./createProduct.php" class="btn btn-primary float-end">
                        <i class="fa-solid fa-plus" style="margin-right: 5px;"></i>Thêm sản phẩm
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "Select * from products";
                            $result = $connection->query($sql);
                            if ($result->num_rows > 0) {
                                while ($Prod = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $Prod['product_id']; ?></td>
                                        <td><?= $Prod['name']; ?></td>
                                        <td style="max-width: 200px; "><img style="width: 100%;  max-height: 200px;  object-fit: contain" src="../../images/<?= $Prod['image_url']; ?>" alt=""></td>
                                        <td><?= number_format($Prod["price"], 0, ',', '.')?></td>
                                        <td><?= $Prod['created_at']?></td>
                                        <td>
                                            <a href="./editProduct.php?product_id=<?= $Prod['product_id'] ?>" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>Sửa
                                            </a>
                                        </td>


                                        <td>
                                            <a href="deleteProductAction.php?product_id=<?php echo $Prod["product_id"]; ?>" class="btn btn-danger action_delete" value="<?= $Prod['product_id']; ?>"><i class="fa-solid fa-trash" style="margin-right: 5px;"></i>Xóa
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