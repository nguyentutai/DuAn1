<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="index.php?act=changepass">Thông tin tài khoản /</a>
        <a href="">Chi tiết đơn hàng</a>
    </div>
</div>
<div class="container container-tt">
    <div class="order-details">
        <div class="detail">
            <table class="table-lists">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá Thanh Toán</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sum = 0;
                    $i = 0;
                    foreach ($load_product_order as $key) {
                        extract($key);
                        $sum = $sum += $unit_price;
                    ?>
                        <tr>
                            <td><?= $i += 1; ?></td>
                            <td><?= $name_product ?></td>
                            <td class="name-dg"><img src="./upload/<?= $image_product ?>" alt=""></td>
                            <td><?= number_format($discount_product, 0, ',', '.') . ' đ' ?></td>
                            <td><?= $quanlity_detail ?></td>
                            <td><?= number_format($unit_price, 0, ',', '.') . ' đ' ?></td>
                            <?php if ($id_status == 5) { ?>
                                <td><a href="?act=evaluate&id=<?= $id_product ?>">Đánh giá</a></td>
                            <?php } ?>
                            <?php if ($id_status != 5) { ?>
                                <td><a href="">Xóa</a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="8" style="text-align:right;">Tổng tiền thanh toán: <?= number_format($sum, 0, ',', '.') . ' đ' ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <?php include 'load_account.php'; ?>
</div>