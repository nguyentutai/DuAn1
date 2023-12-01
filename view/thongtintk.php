<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Thông Tin Tài Khoản</a>
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
                        <input type="text" value="<?= $user ?>" disabled><br>
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
            <div class="list_order">
                <?php if (!empty($load_order_account)) { ?>

                    <table class="table-list">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Người Nhận</th>
                                <th>Ngày đặt</th>
                                <th>Trạng Thái Đơn Hàng</th>
                                <th>Tổng Tiền Thanh Toán</th>
                                <th colspan="2">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($load_order_account as $order_account) {
                                extract($order_account);
                            ?>
                                <tr>
                                    <td><?= $code_orders ?></td>
                                    <td><?= $name_recipient ?></td>
                                    <td><?= $date_order ?></td>
                                    <?php
                                    switch ($id_status) {
                                        case '1':
                                            echo '<td style="font-weight:bold;">Chờ xác nhận</td>';
                                            break;
                                        case '2':
                                            echo '<td style="font-weight:bold;">Chờ lấy hàng</td>';
                                            break;
                                        case '3':
                                            echo '<td style="font-weight:bold;">Đã giao</td>';
                                            break;
                                        case '4':
                                            echo '<td style="font-weight:bold;">Đã hủy</td>';
                                            break;
                                        case '5':
                                            echo '<td style="font-weight:bold;">Trả hàng</td>';
                                            break;
                                    }

                                    ?>
                                    <td><?= number_format($sum_money, 0, ',', '.') . ' đ' ?></td>
                                    <?php if ($id_status == 5) { ?>
                                        <td></td>
                                    <?php } else { ?>
                                        <td><a href="?act=deleteOrder&id=<?= $id_order ?>">Hủy đơn hàng</a></td>
                                    <?php } ?>

                                    <td><a href="?act=chitietOrder&id=<?= $id_order ?>">Xem chi tiết</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="no-order">
                        <h3>Không có đơn hàng nào</h3>
                        <div class="no-image">
                            <img src="./image/kocoj.png" alt="">
                        </div>
                        <button class="hom"><a href="index.php">Về Trang Chủ</a></button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="Tab3" class="tabcontent">

        </div>
    </div>
    <?php include 'load_account.php'; ?>