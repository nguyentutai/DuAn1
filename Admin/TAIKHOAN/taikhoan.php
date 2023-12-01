<?php if (isset($_SESSION['login'])) {
    extract($_SESSION['login']);
?>
    <div class="row p-4 mgtop">
        <div class="row rounded-2 bg-light p-3">
            <p class="fw-bold fs-4">Cập nhật tài khoản</p>
            <form action="index.php?act=taikhoan" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <input type="hidden" name="id_account" value="<?= $id_account ?>">
                        <label for="formGroupExampleInput" class="form-label fw-semibold fs-5">Tên</label>
                        <input type="text" name="name_account" value="<?= $user ?>" class="form-control" id="formGroupExampleInput" placeholder="Nhập vào tên">
                        <p class="text-danger fs-6 mt-1 fw-bolder"></p>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label fw-semibold fs-5">Email</label>
                        <input type="email" name="email_account" value="<?= $email_account ?>" class="form-control" id="" placeholder="Nhập vào email">
                        <p class="text-danger fs-6 mt-1 fw-bolder"></p>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label fw-semibold fs-5">Số điện thoại</label>
                        <input type="number" name="phone_account" class="form-control" id="" value="<?= $phone_account ?>" placeholder="Nhập vào số điện thoại">
                        <p class="text-danger fs-6 mt-1 fw-bolder"></p>
                    </div>
                </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-2 ">
                <label for="" class="form-label fw-semibold fs-5 mt-1">Ảnh chính</label>
                <label for="imagemain" class="w-100 text-center bg-dark text-light image rounded-4"><i class="fa-solid fa-cloud-arrow-up fs-1"></i></label>
                <input type="file" name="image" class="form-control-file d-none" id="imagemain">

            </div>
            <div class="col-md-2">
                <img src="../upload/<?= $image_account ?>" class="img-fluid w-100 mt-3 text-center rounded-5" alt="">
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-warning fw-bold mt-4" name="btn-submit" type="submit">Cập Nhật Tài Khoản</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php } ?>