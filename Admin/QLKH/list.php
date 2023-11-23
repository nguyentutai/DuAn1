
    <div class="row p-4">
        <div class="row text-center d-flex justify-content-between">
            <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ KHÁCH HÀNG</h5>
            <form action="index.php?act=listkh" method="post" class="col-md-3 d-flex h-75 position-relative">
                <input type="text" placeholder="Nhập email hoặc tên khách hàng ..." name="search" class="form-control rounded-end">
                <button type="submit" name="btn-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Danh sách khách hàng</p>
            <table class="text-center">
                <thead class="text-center">
                    <tr>
                        <th class="fs-6">STT</th>
                        <th class="fs-6">Ảnh khách hàng</th>
                        <th class="fs-6">Tên khách hàng</th>
                        <th class="fs-6">Email</th>
                        <th class="fs-6">Phone</th>
                        <th colspan="2" class="fs-6">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach ($load_all_account as $loadac) {
                        extract($loadac); ?>
                        <tr>
                            <td><?= $i+=1 ?></td>
                            <td><img class="mt-5 image_acc" src="../upload/<?= $image_account ?>" alt=""></td>
                            <td><?= $user ?></td>
                            <td><?= $email_account ?></td>
                            <td><?= $phone_account ?></td>
                            <td><a href="" class="btn btn-danger fw-bold ">Xóa</a></td>
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