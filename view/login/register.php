<div class="container-1">
    <div class="container-login container" style="margin-top:110px;">
        <div class="login">
            <h2>Đăng Ký</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="user">
                    <p>Username :</p>
                    <input type="text" name="username" placeholder="Nhập tên"><br>
                    <label style="color: red;font-size:15px;margin-top:5px;"><?= is_error('username') ?></label>
                </div>
                <div class="pass">
                    <p>Password :</p>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu"><br>
                    <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('password') ?></label>
                </div>
                <div class="showpass">
                    <input id="showpass" type="checkbox">
                    <label for="">Hiển thị mật khẩu</label>
                </div>
                <div class="confim-pass pass">
                    <p>ConfirmPass :</p>
                    <input type="password" name="password-confim" id="password" placeholder="Nhập lại mật khẩu"><br>
                    <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('password-confirm') ?></label>
                </div>
                <div class="phone-email">
                    <div class="phone">
                        <p>Phone :</p>
                        <input type="number" name="phone" placeholder="Nhập số điện thoại"><br>
                        <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('phone') ?></label>
                    </div>
                    <div class="email">
                        <p>Email :</p>
                        <input type="email" name="email" placeholder="Nhập email"><br>
                        <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('email') ?></label>
                    </div>
                </div>
                <div class="image-contai">
                    <div class="image">
                        <p>Thêm Ảnh</p>
                        <label for="imagedk" id="input" name="image"><i class="fa-solid fa-cloud-arrow-up"></i></label>
                        <input type="file" name="image" id="imagedk">
                    </div>
                    <div class="showimage">
                        <img src="" alt="" id="img">
                    </div>
                </div>
                <div class="btn-login">
                    <button type="submit" name="btn-register">Đăng Ký</button>
                    <p>Bạn đã có tài khoản <a href="?act=login">Đăng Nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var passwordInput = document.getElementById("password");
    var toggleCheckbox = document.getElementById("showpass");

    toggleCheckbox.addEventListener("change", function() {
        if (toggleCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
    let img = document.getElementById("img");
    let input = document.getElementById("imagedk");

    input.onchange = (e) => {
        if (input.files[0]) {
            img.src = URL.createObjectURL(input.files[0]);
        }
    };
</script>