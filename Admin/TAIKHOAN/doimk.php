<?php if (isset($_SESSION['login'])) {
    extract($_SESSION['login']);
?>
    <div class="row p-4 mgtop">
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Đổi mật khẩu</p>
            <form action="index.php?act=doimktk" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <input type="hidden" name="id_account" value="<?= $id_account ?>">
                        <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Tên</label>
                        <input type="text" name="name_account" value="<?= $user ?>" disabled class="form-control" id="formGroupExampleInput">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label fw-semibold fs-5">Mật khẩu cũ</label>
                        <input type="password" name="pass_cu" class="form-control" id="">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('pass_cu') ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label fw-semibold fs-5">Mật khẩu mới</label>
                        <input type="password" name="pass_moi" class="form-control" id="">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('pass_moi') ?></p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label fw-semibold fs-5">Xác nhận mật khẩu</label>
                        <input type="password" name="xacnhan_pass" class="form-control" id="">
                        <p class="text-danger fs-6 mt-1 fw-bolder"><?= is_error('xacnhan_pass') ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-warning fw-bold mt-4" name="btn-submit" type="submit">Đổi mật khẩu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>