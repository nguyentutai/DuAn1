<div class="row p-4 mgtop">
    <div class="row text-center d-flex justify-content-between">
        <h5 class="fs-4 fw-bold bg-success p-2 col-md-3 rounded-pill">QUẢN LÝ KHÁCH HÀNG</h5>
        <!-- <a href="?act=addsp" class="btn btn-primary fw-bold col-md-2 h-75">Thêm sản phẩm</a> -->
        <!-- <a href="" class="btn btn-dark fw-bold col-md-2 h-75">Thùng rác</a> -->
        <form action="index.php?act=listkh" method="post" class="col-md-3 d-flex h-75 position-relative">
            <input type="text" placeholder="Nhập email hoặc tên khách hàng ..." name="search" class="form-control rounded-end">
            <button type="submit" name="btn-search" class="btn btn-primary fw-bold position-absolute end-0 h-100"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="rounded-2 bg-light p-3 mt-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Danh sách khách hàng</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Danh sách nhân viên</button>
            </li>
        </ul>
        <div class="tab-content row" id="pills-tabContent">
            <div class="tab-pane fade show active col-md-12" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="text-center col-md-12">
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
                        <?php $i = 0;
                        foreach ($load_all_account as $loadac) {
                            extract($loadac); ?>
                            <tr>
                                <td><?= $i += 1 ?></td>
                                <td><img class="mt-5 image_acc" src="../upload/<?= $image_account ?>" alt=""></td>
                                <td><?= $user ?></td>
                                <td><?= $email_account ?></td>
                                <td><?= $phone_account ?></td>
                                <td><a href="index.php?act=updatekh&id=<?= $id_account ?>&idupdate=<?= $role ?>" class="btn btn-info fw-bold ">Làm Nhân Viên</a></td>
                                <td><a href="index.php?act=deletekh&id=<?= $id_account ?>" class="btn btn-danger fw-bold ">Xóa</a></td>
                            </tr>
                        <?php } ?>
                        <em class="fs-6 fw-bold mb-2 mt-4">Số khách hàng : <?= $i ?></em>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="text-center col-md-12">
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
                        <?php $i = 0;
                        foreach ($load_nn_account as $loadac) {
                            extract($loadac); ?>
                            <tr>
                                <td><?= $i += 1 ?></td>
                                <td><img class="mt-5 image_acc" src="../upload/<?= $image_account ?>" alt=""></td>
                                <td><?= $user ?></td>
                                <td><?= $email_account ?></td>
                                <td><?= $phone_account ?></td>
                                <td><a href="index.php?act=updatekh&id=<?= $id_account ?>&idupdate=<?= $role ?>" class="btn btn-info fw-bold ">Làm Khách Hàng</a></td>
                                <td><a href="index.php?act=deletekh&id=<?= $id_account ?>" class="btn btn-danger fw-bold ">Xóa</a></td>
                            </tr>
                        <?php } ?>
                        <em class="fs-6 fw-bold mb-2 mt-4">Số nhân viên : <?= $i ?></em>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</div>
</div>