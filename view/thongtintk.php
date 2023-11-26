<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Tài Khoản</a>
    </div>
</div>

<div class="container container-tt">
    <div class="tabs">
        <div class="tab-content">
            <ul>
                <li>
                    <a class="tablinks" onclick="openTab(event, 'Tab1')">
                        Đổi mật khẩu
                    </a>
                </li>
                <li>
                    <a class="tablinks" onclick="openTab(event, 'Tab2')">
                        Đơn hàng của bạn</a>
                </li>
                <li>
                    <a class="tablinks" onclick="openTab(event, 'Tab3')">
                        Lịch sử đặt hàng
                    </a>
                </li>
            </ul>
        </div>

        <div id="Tab1" class="tabcontent content-1">
            <div class="changepassword">
                <form action="index.php?act=changepass" method="POST">
                    <input type="hidden" value='<?= $id_account ?>' name='idtk'>
                    <div class="name_user">
                        <label for="">Tên tài khoản</label><br>
                        <input type="text" value="<?= $user ?>"><br>
                    </div>
                    <div class="pass_cu">
                        <label for="">Mật khẩu cũ</label><br>
                        <input type="password" placeholder="Nhập vào mật khẩu cũ" name="passold"><br>
                        <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('passold') ?></label>
                    </div>
                    <div class="pass_cu">
                        <label for="">Mật khẩu mới</label><br>
                        <input type="password" placeholder="Nhập vào mật khẩu mới" name="passnew"><br>
                        <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('passnew') ?></label>
                    </div>
                    <div class="pass_cu">
                        <label for="">Xác nhận mật khẩu</label><br>
                        <input type="password" placeholder="Xác nhận mật khẩu mới" name="passconfim"><br>
                        <label style="color: red;font-size:15px;margin-top:5px;font-weight:bold;"><?= is_error('passconfim') ?></label>
                    </div>
                    <div class="forms">
                        <button type="submit" name="btns-submit">Đổi Mật Khẩu</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="Tab2" class="tabcontent">
            <h3>Không có đơn hàng nào</h3>
        </div>
        <div id="Tab3" class="tabcontent">

        </div>
    </div>
    <?php if (isset($_SESSION['login'])) extract($_SESSION['login']) ?>
    <div class="account">
        <div class="image_account">
            <img src="./upload/<?= $image_account ?>" alt="" />
        </div>
        <div class="name_accounts">
            <h3><?= $user ?></h3>
        </div>
        <div class="email-account">
            <i class="fa-solid fa-envelope"></i>
            <p><?= $email_account ?></p>
        </div>
        <div class="phone-account">
            <i class="fa-solid fa-square-phone"></i>
            <p><?= $phone_account ?></p>
        </div>
        <div class="cntt">
            <button id="openPopup">Cập Nhật Thông Tin</button>
        </div>
    </div>
</div>

<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close" id="closePopup"><i class="fa-solid fa-circle-xmark"></i></span>
        <div class="capnhattt">
            <div class="capnhat-title">
                <h3>Cập Nhật Thông Tin</h3>
            </div>
            <form action="index.php?act=capnhattt" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_ac" value="<?= $id_account ?>">
                <div class="list1">
                    <div class="tt1">
                        <label for="">Tên tài khoản</label><br>
                        <input type="text" name="name_ac" value="<?= $user ?>"><br>
                    </div>
                    <div class="tt2">
                        <label for="">Email</label><br>
                        <input type="email" name="email_ac" value="<?= $email_account ?>"><br>
                    </div>
                </div>

                <div class="list2">
                    <div class="tt3">
                        <label for="">Phone</label><br>
                        <input type="number" name="phone_ac" value="<?= $phone_account ?>"><br>
                    </div>
                    <div class="image_acc">
                        <label for="">Ảnh</label><br>
                        <label class="images_ac" for="image"><i class="fa-solid fa-cloud-arrow-up"></i></label>
                        <input type="file" name="image" id="image" style="display:none;">
                    </div>
                    <div class="image_acc">
                        <label for="">Ảnh cũ</label><br>
                        <img src="./upload/<?= $image_account ?>" alt="">
                    </div>
                </div>
                <div class="list3">
                    <button type="submit" class="btsmit" name="btn-submit">Cập Nhật</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    document.getElementById('openPopup').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'flex';
    });

    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
    });

    // Đóng popup khi click bên ngoài phần popup
    window.addEventListener('click', function(event) {
        var popup = document.getElementById('popup');
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });

    function openTab(event, tabName) {
        let i, tabcontent, tablinks;

        // Hide all tab content
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Remove the 'active' class from all tab links
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }

        // Show the specific tab content
        document.getElementById(tabName).style.display = "block";

        // Add the 'active' class to the button that opened the tab
        event.currentTarget.classList.add("active");
    }
    // Set the default tab to be opened
    document.getElementById("defaultOpen").click();
</script>