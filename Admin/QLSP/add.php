<div class="row p-4 mgtop">
    <div class="row text-center">
        <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Tạo sản phẩm mới</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Tên sản
                        phẩm</label>
                    <input type="text" name="name_product" class="form-control" id="formGroupExampleInput" placeholder="Nhập vào tên sản phẩm">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('name_product') ?></p>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="" class="form-label fw-semibold fs-5">Số lượng</label>
                    <input type="number" name="quantity_product" class="form-control" id="" placeholder="Nhập vào số lượng">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('quantity_product') ?></p>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="" class="form-label fw-semibold fs-5">Ngày thêm</label>
                    <input type="date" name="date_product" class="form-control" id="" placeholder="Nhập vào số lượng">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('date_product') ?></p>
                </div>
            </div>

            <div class="content1 row">
                <div class="col-md-4">
                    <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Danh
                        mục</label>
                    <select class="form-select" name="id_category" aria-label="Default select example">
                        <option value="0">-- Danh mục sản phẩm --</option>
                        <?php
                        foreach ($listdm as $categogy) {
                            extract($categogy);
                            echo '<option value="' . $id_category . '">' . $name_category . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label fw-semibold fs-5">Giá gốc</label>
                    <input type="number" name="origin_price" class="form-control" id="" placeholder="Nhập vào giá gốc">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('origin_price') ?></p>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label fw-semibold fs-5">Giá khuyễn mãi</label>
                    <input type="number" name="discount_product" class="form-control" id="" placeholder="Nhập vào giá khuyễn mãi">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('discount_product') ?></p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-7">
                    <label for="exampleFormControlTextarea1" class="form-label fw-semibold fs-5">Nhập mô
                        tả sản phẩm</label>
                    <textarea textarea class="form-control" name="describe" id="exampleFormControlTextarea1" placeholder="Nhập mô tả sản phẩm" rows="7.5">
                        </textarea>
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('describe') ?></p>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label fw-semibold fs-5 mt-1">Ảnh chính</label>
                    <label for="imagemain" class="w-100 text-center bg-dark text-light image rounded-4"><i class="fa-solid fa-cloud-arrow-up fs-1"></i></label>
                    <input type="file" name="image" class="form-control-file d-none" id="imagemain">
                    <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('image') ?></p>
                </div>
                <div class="col-md-3 ">
                    <label for="" class="form-label fw-semibold fs-5 mt-1">Ảnh mô tả</label>
                    <input type="file" name="images[]" class="form-control-file" id="imagemain" multiple="multiple">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-warning fw-bold mt-4" name="btn-submit" type="submit">Thêm Sản Phẩm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<a href="?act=listsp" class="btn btn-primary fw-bold">Danh sách sản phẩm</a>
<a href="" class="btn btn-dark fw-bold">Thùng Rác</a>
</div>
</div>
</div>