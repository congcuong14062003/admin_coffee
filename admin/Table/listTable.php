<?php
session_start();
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
                                <th scope="col">Giá khuyến mại</th>
                                <th scope="col">Tồn kho</th>
                                <th scope="col">Đã bán</th>
                                <th scope="col">Loại danh mục</th>
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
                                        <td><?= $Prod['ProdId']; ?></td>
                                        <td><?= $Prod['ProdName']; ?></td>
                                        <td style="max-width: 150px"><img style="width: 100%;" src="../../images/<?= $Prod['ProdImage']; ?>" alt=""></td>
                                        <td><?= number_format($Prod["ProdPrice"], 0, ',', '.')?></td>
                                        <td><?= number_format($Prod["ProdPriceSale"], 0, ',', '.')?></td>
                                        <td><?= $Prod['ProdQuantity']?></td>
                                        <td><?= $Prod['ProdQuantityRemain']?></td>
                                        <td><?= $Prod["ProdCategoryName"] ?></td>
                                        <td>
                                            <a href="./editProduct.php?ProdId=<?= $Prod['ProdId'] ?>" class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>Sửa
                                            </a>
                                        </td>


                                        <td>
                                            <a href="deleteProductAction.php?ProdId=<?php echo $Prod["ProdId"]; ?>" class="btn btn-danger action_delete" value="<?= $Prod['ProdId']; ?>"><i class="fa-solid fa-trash" style="margin-right: 5px;"></i>Xóa
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