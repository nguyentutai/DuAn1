
<div class="row p-4 mgtop">
        <div class="row text-center">
            <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ DANH MỤC</h5>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Danh sách danh mục</p>
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
                    foreach ($list_product_category as $loadsp) {
                        extract($loadsp) ?>
                        <tr>
                            <td><?= $i+=1; ?></td>
                            <td><?= $name_product ?></td>
                            <td><img class="rounded mx-auto d-block img-fluid w-50 imagedm mt-3" src="../upload/<?= $image_product ?>" alt="">
                            </td>
                            <td><?= $describe_product?></td>             
                            <td><?= $veiw_product ?></td>
                             <td><?= $quantity_product ?></td>
                                <td><a href="?act=deletesp&id=<?= $id_product ?>" class="btn btn-danger fw-bold ">Xóa</a></td>
                            <td><a href="?act=suasp&id=<?= $id_product ?>" class="btn btn-success fw-bold">Sửa</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="?act=adddm" class="btn btn-primary fw-bold">Thêm danh mục</a>
    <a href="" class="btn btn-dark fw-bold">Thùng rác</a>