<?php
require_once('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
$ProdId = $_REQUEST['product_id'];

// Lấy thông tin sản phẩm
$sqlProd = "SELECT * FROM Products where product_id = $ProdId";
$product = mysqli_query($connection, $sqlProd);
$dataProduct = mysqli_fetch_assoc($product);




?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="./editProduct.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Sản phẩm</li>
            <li class="breadcrumb-item active">Sửa sản phẩm</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="./editProductAction.php?ProdId=<?php echo $ProdId ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pname">Tên sản phẩm</label>
                                <input required type="text" class="form-control" name="name"
                                    value="<?php echo $dataProduct['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="pprice">Giá sản phẩm</label>
                                <input required type="number" class="form-control" name="price"
                                    value="<?php echo $dataProduct['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="pimage">Ảnh sản phẩm</label>
                                <input class="form-control image_prod" accept="image/*" type="file" name="image_url">
                                <img class="preview" style="width: 130px; margin: 50px;"
                                    src="../../images/<?php echo $dataProduct['image_url'] ?>" alt="Ảnh sản phẩm">
                            </div>

                            <script>
                                const inputImg = document.querySelector("input.image_prod");
                                const previewImg = document.querySelector("img.preview");

                                inputImg.addEventListener("change", function (e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            previewImg.src = e.target.result; // Cập nhật ảnh mới vào thẻ img
                                        };
                                        reader.readAsDataURL(file); // Đọc file ảnh dưới dạng URL để hiện ảnh mới
                                    } else {
                                        previewImg.src = "../../images/<?php echo $dataProduct['image_url'] ?>"; // Hiển thị ảnh cũ nếu không chọn ảnh mới
                                    }
                                });
                            </script>
                            <div class="form-group">
                                <button name="edit_product" type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                                <a href="listProduct.php" class="btn btn-danger mt-2">Quay lại</a>
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