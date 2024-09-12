<?php
session_start();
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
require_once('../../config/cnDB.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Sản Phẩm Mới</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>

<body>
    <div class="container">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Sản phẩm</li>
            <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="./createProductAction.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="product_id" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhóm sản phẩm</label>
                                <select name="slCid" class="form-control">
                                    <option value="">Chọn danh mục sản phẩm</option>
                                    <option value="iPhone">iPhone</option>
                                    <option value="iPad">iPad</option>
                                    <option value="Phụ kiện">Phụ kiện</option>
                                    <option value="AirPod">AirPod</option>
                                    <option value="Macbook">Macbook</option>
                                    <option value="Thiết bị gia dụng">Thiết bị gia dụng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required type="text" class="form-control" name="pname">
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input required type="number" class="form-control" name="pquantity">
                            </div>
                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input required type="number" class="form-control" name="pprice">
                            </div>
                            <div class="form-group">
                                <label>Giá đã được giảm giá</label>
                                <input required type="number" class="form-control" name="ppricesale">
                            </div>
                            <div class="form-group">
                                <label for="image_prod">Ảnh sản phẩm</label>
                                <input type="file" id="image_prod" class="form-control" name="pimage">
                                <label for="image_prod">
                                    <img class="preview" style="width: 130px; margin: 50px; border: 1px dotted" src="https://icons-for-free.com/iconfiles/png/512/upload+export+upload+upload+to+cloud+icon-1320165659391053645.png" alt="">
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="pdesc" id="editor" class="form-control">Viết mô tả vào đây</textarea>
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
                                    });
                                </script>
                            </div>
                            <button name="add_product" class="btn btn-primary mt-2" type="submit">Đăng sản phẩm</button>
                            <a href="myProduct.php" class="btn btn-danger mt-2">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const inputImg = document.querySelector("input#image_prod");
        inputImg.addEventListener("change", function(e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
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