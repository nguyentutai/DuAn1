<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ SẢN PHẨM</h5>
        <form action="index.php?act=listkh" method="post" class="col-md-3 d-flex h-75 position-relative">
            <input type="text" placeholder="Nhập tên sản phẩm cần tìm ..." name="search" class="form-control rounded-end">
            <button type="submit" name="btn-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="row rounded-2 bg-light p-3">
        <p class="fw-bold fs-4">Thống kê bình luận theo sản phẩm</p>
        <table class="text-center">
            <thead class="text-center">
                <tr>
                    <th class="fs-6">STT</th>
                    <th class="fs-6">Người Bình Luận</th>
                    <th class="fs-6">Nội Dung Bình Luận</th>
                    <th class="fs-6">Ngày Bình Luận</th>
                    <th colspan="2" class="fs-6">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; foreach($list_comment_product as $listbl){
                    extract($listbl);
                    ?>
                <tr>
                    <td class="fs-6"><?= $i+=1; ?></td>
                    <td class="fs-6"><?= $user ?></td>
                    <td class="fs-6"><?= $content_comment ?></td>
                    <td class="fs-6"><?= $date_comment ?></td>
                    <td><a href="index.php?act=anbl&id=<?= $id_comment ?>" class="btn btn-success fw-bold">Ẩn Bình Luận</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<a href="?act=listtg&id=<?= $id_product ?>" class="btn btn-dark fw-bold">Bình Luận Đã Ẩn</a>
</div>
</div>