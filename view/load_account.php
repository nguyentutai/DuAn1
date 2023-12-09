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