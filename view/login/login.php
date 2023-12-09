<div class="container-1" style="padding-top:76px;   ">
    <div class="container-login container">
    <div class="login">
        <h2>Đăng Nhập</h2>
        <form action="index.php?act=login" method="POST">
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
                <label for="">ShowPass</label>
            </div>
            <div class="btn-login">
                <button type="submit" name="btn-login">Đăng Nhập</button>
                <p>Quên mật khẩu <a href="?act=quenmatkhau">Lấy lại mật khẩu</a></p>
                <p>Bạn chưa có tài khoản <a href="?act=register">Đăng kí</a></p>
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
</script>