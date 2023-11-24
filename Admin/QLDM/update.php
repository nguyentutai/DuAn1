


<div class="col-md-10">

    <?php extract($load_one_category); ?>
    <div class="row p-4 mgtop">
        <div class="row text-center">
            <h5 class="fs-3 fw-bold bg-warning p-2 col-md-3 rounded-pill">QUẢN LÝ DANH MỤC</h5>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Update Danh Mục</p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="hidden" name="id_category" value="<?= $id_category ?>">
                        <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Tên danh mục</label>
                        <input type="text" class="form-control" value="<?= $name_category ?>" name="name-category" id="formGroupExampleInput" placeholder="Nhập vào tên danh mục">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('name-category') ?></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label fw-semibold fs-5">Thêm đường dẫn tĩnh</label>
                        <input type="text" name="link" <?= $link_category ?> class="form-control" id="" placeholder="Link ...">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('link') ?></p>
                    </div>
                </div>
                <?php if($parent_id != 0) {?>
                    <div class="content1 row">
                        <div class="col-md-6">
                            <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Danh
                                mục cha</label>
                            <select class="form-select" name="parent-category" aria-label="Default select example">
                                <option selected value="0">--- Danh mục sản phẩm ---</option>
                                <?php
                                foreach ($loaddm as $dm) {
                                ?>
                                    <option value="<?= $dm['id_category'] ?>" <?= ($parent_id == $dm['id_category'])?'selected':''; ?> ><?= $dm['name_category'] ?></option>
                                <?php   
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <div class="row mt-4">
                    <div class="col-md-2">
                        <label for="" class="form-label fw-semibold fs-5 mt-1">Ảnh Danh Mục</label>
                        <label for="imagemain" class="w-100 text-center bg-dark text-light image rounded-4"><i class="fa-solid fa-cloud-arrow-up fs-1"></i></label>
                        <input type="file" class="form-control-file d-none" name="image" id="imagemain">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('image') ?></p>
                    </div>
                    <div class="col-md-2">
                        <img class="w-100 mt-5 ms-5" src="../upload/<?= $image_category ?>" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-warning fw-bold mt-4" name="btn-submit" type="submit">Update Danh Mục</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a href="?act=listdm" class="btn btn-warning fw-bold">Danh sách danh mục</a>
    <a href="" class="btn btn-dark fw-bold">Thùng Rác</a>
</div>
</div>
</div>