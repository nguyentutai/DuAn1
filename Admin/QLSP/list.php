<div class="col-md-10">
    <div class="row bg-dark p-2 text-end">
        <a href="" class="text-light text-none"><i class="fa-solid fa-right-from-bracket fs-5 me-5"></i></a>
    </div>
    <div class="row p-4">
        <div class="row text-center">
            <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Danh sách sản phẩm</p>
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
                    foreach ($listsp as $loaddm) {
                        extract($loaddm) ?>
                        <tr>
                            <td><?= $i+=1; ?></td>
                            <td><?= $name_product ?></td>
                            <td><img class="rounded mx-auto d-block img-fluid w-50 imagedm mt-3" src="../upload/<?= $image_product ?>" alt="">
                            </td>
                            <td><?= $describe_product?></td>             
                            <td><?= $veiw_product ?></td>
                             <td><?= $quantity_product ?></td>
                                <td><a href="?act=deletedm&id=<?= $id_product ?>" class="btn btn-danger fw-bold ">Xóa</a></td>
                            <td><a href="?act=suadm&id=<?= $id_product ?>" class="btn btn-success fw-bold">Sửa</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="?act=addsp" class="btn btn-primary fw-bold">Thêm sản phẩm</a>
    <a href="" class="btn btn-dark fw-bold">Thùng rác</a>
</div>
</div>