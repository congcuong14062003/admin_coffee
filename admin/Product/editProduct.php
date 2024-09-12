<?php
session_start();
require_once('../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
$ProdId = $_REQUEST['ProdId'];

// Lấy thông tin sản phẩm
$sqlProd = "SELECT * FROM product where ProdId = $ProdId";
$product = mysqli_query($connection, $sqlProd);
$dataProduct = mysqli_fetch_assoc($product);


// lấy thông tin các danh mục sản phấm 
$sqlcate = "SELECT ProdCategoryName FROM productproperty group by ProdCategoryName;";
$listCate = mysqli_query($connection, $sqlcate);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="./editProduct.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <form action="./editProductAction.php?ProdId=<?php echo $ProdId ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="slCid">Nhóm sản phẩm</label>
                                <select name="slCid" id="slCid" class="form-select">
                                    <option value="">_________Tên danh mục________</option>
                                    <?php
                                    foreach ($listCate as $key => $value) {
                                        $isSelected = ($value['ProdCategoryName'] == $dataProduct["ProdCategoryName"]) ? 'selected' : '';
                                    ?>
                                        <option value="<?php echo $value['ProdCategoryName'] ?>" <?php echo $isSelected ?>><?php echo $value["ProdCategoryName"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pname">Tên sản phẩm</label>
                                <input required type="text" class="form-control" name="pname" value="<?php echo $dataProduct['ProdName'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="pquantity">Số lượng</label>
                                <input required type="number" class="form-control" name="pquantity" value="<?php echo $dataProduct['ProdQuantity'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="pprice">Giá gốc</label>
                                <input required type="number" class="form-control" name="pprice" value="<?php echo $dataProduct['ProdPrice'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="ppricesale">Giá đã được giảm giá</label>
                                <input required type="number" class="form-control" name="ppricesale" value="<?php echo $dataProduct['ProdPriceSale'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="pimage">Ảnh sản phẩm</label>
                                <input class="form-control image_prod" accept="image/*" type="file" name="pimage">
                                <img class="preview" style="width: 130px; margin: 50px;" src="../../images/<?php echo $dataProduct['ProdImage'] ?>" alt="">
                            </div>
                            <script>
                                const inputImg = document.querySelector("input.image_prod");
                                inputImg.addEventListener("change", function(e) {
                                    const file = e.target.files[0];

                                    if (file) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            document.querySelector("img.preview").src = e.target.result;
                                        };

                                        reader.readAsDataURL(file);
                                    } else {
                                        document.querySelector("img.preview").src = "../../images/<?php echo $dataProduct['ProdImage'] ?>";
                                    }
                                });
                            </script>
                            <div class="form-group">
                                <label for="pdesc">Mô tả</label>
                                <textarea name="pdesc" id="editor" class="form-control"><?php echo $dataProduct["ProdDescription"] ?></textarea>
                            </div>
                            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                })
                            </script>
                            <div class="form-group">
                                <button name="add_product" type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                                <a href="myProduct.php" class="btn btn-danger mt-2">Quay lại</a>
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