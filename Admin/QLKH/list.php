<div class="col-md-10">
    <div class="row bg-dark p-2 text-end">
        <a href="" class="text-light text-none"><i class="fa-solid fa-right-from-bracket fs-5 me-5"></i></a>
    </div>
    <div class="row p-4">
        <div class="row text-center">
            <h5 class="fs-3 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ KHÁCH HÀNG</h5>
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
                            <td><a href="" class="btn btn-success fw-bold">Sửa</a></td>
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