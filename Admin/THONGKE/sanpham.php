<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
        <form action="index.php?act=tkspdm" method="post" class="col-md-3 d-flex h-75 position-relative">
            <input type="text" placeholder="Nhập tên danh mục cần tìm ..." name="search" class="form-control rounded-end">
            <button type="submit" name="btn-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Thống kê sản phẩm theo danh mục</p>
        <table class="text-center">
            <thead class="text-center">
                <tr>
                    <th class="fs-6">STT</th>
                    <th class="fs-6">Tên Danh Mục</th>
                    <th class="fs-6">Sản Phẩm</th>
                    <th colspan="2" class="fs-6">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach($list_thongke as $listtk){
                    extract($listtk);
                ?>
                <tr class="mt-4">
                    <td class="fs-6"><?= $i+=1; ?></td>
                    <td class="fs-6"><?= $name_category ?></td>
                    <td class="fs-6"><?= $soluongsp ?></td>
                    <td><a href="index.php?act=listspdm&id=<?= $id_category ?>" class="btn btn-success fw-bold">Xem Chi Tiết</a></td>
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