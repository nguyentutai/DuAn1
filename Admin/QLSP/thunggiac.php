<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
        <form action="index.php?act=thunggiac" method="post" class="col-md-3 d-flex h-75 position-relative">
            <input type="text" placeholder="Nhập tên sản phẩm cần tìm ..." name="search" class="form-control rounded-end">
            <button type="submit" name="btns-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Danh sách sản phẩm trong thùng giác</p>
        <?php if (!empty($listtg)) { ?>
            <table class="text-center">
                <thead class="text-center">
                    <tr>
                        <th class="fs-6">STT</th>
                        <th class="fs-6">Tên sản phẩm</th>
                        <th class="fs-6">Hình ảnh</th>
                        <th class="fs-6">Mô tả</th>
                        <th class="fs-6">View</th>
                        <th class="fs-6">Số lượng</th>
                        <th colspan="2" class="fs-6">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($listtg as $loaddm) {
                        extract($loaddm) ?>
                        <tr>
                            <td><?= $i += 1; ?></td>
                            <td><?= $name_product ?></td>
                            <td><img class="rounded mx-auto d-block img-fluid w-50 imagedm mt-3" src="../upload/<?= $image_product ?>" alt="">
                            </td>
                            <td><?= $describe_product ?></td>
                            <td><?= $veiw_product ?></td>
                            <td><?= $quantity_product ?></td>
                            <td><a href="?act=deletesp&id=<?= $id_product ?>" class="btn btn-danger fw-bold ">Xóa luôn</a></td>
                            <td><a href="?act=khoiphucsp&id=<?= $id_product ?>" class="btn btn-success fw-bold ">Khôi phục</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="?act=listsp" class="btn btn-primary fw-bold">Danh sách sản phẩm</a>
        <?php } else { ?>

            <div class="col-md-12 text-center">
                <img src="../image/kocoj.png" alt="">
                <p class="fs-5 fw-bold">Không có sản phẩm nào</p>
            </div>

        <?php } ?>
    </div>
</div>

</div>
</div>