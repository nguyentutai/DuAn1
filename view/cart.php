<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Giỏ hàng</a>
    </div>
</div>

<div class="tk-cart container-cart">
    <i class="fa-solid fa-cart-shopping"></i>
    <p>Giỏ Hàng ( <?= count($_SESSION['addToCard']) ?> Sản phẩm ) </p>
</div>

<div class="product-cart container-cart">

    <?php if (isset($_SESSION['addToCard'])) {
        $tongdonhang = 0;
        $i = 0;
        foreach ($_SESSION['addToCard'] as $cart) {
            $tongdonhang += $cart[6];
    ?>
            <div class="list-product-cart">
                <div class="image-product-cart">
                    <img src="./upload/<?= $cart[1]; ?>" alt="" />
                </div>
                <div class="content-product-cart">
                    <div class="name-product-cart">
                        <h3><?= $cart[2]; ?></h3>
                    </div>
                    <div class="pri-quantity">
                        <div class="soluong">
                            <p>Số lượng sản phẩm</p>
                        </div>
                        <div class="quantity-product-cart">
                            <div class="ct-quantity">
                                <p><span id="quantity"><?= $cart[5] ?></span></p>
                            </div>
                            <div class="price-product-cart">
                                <p><span id="price"><?= number_format($cart[6], 0, ',', '.') . ' đ' ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="delete-cart">
                    <a href="index.php?act=deletecard&id=<?= $i ?>"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>

        <?php
            $i += 1;
        } ?>
        <div class="list-all-dh">
            <div class="tongdonhang">
                <p>Tổng giá trị đơn hàng: <?= number_format($tongdonhang, 0, ',', '.') . ' đ' ?> </p>
            </div>
            <div class="deleteall">
                <a href="index.php?act=deleteallcard"><button>Xóa toàn bộ đơn hàng</button></a>
            </div>
        </div>
    <?php } ?>

</div>

<div class="form-kh container-cart">
    <h2>Thông Tin Khách Hàng</h2>
    <label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('script') ?></label>
    <form action="index.php?act=addorder" class="form-kh-1" method="post">
        <div class="form-kh-input">
            <input type="text" name="username" class="form-kh-in" placeholder="Họ và tên"><br>
        </div>
        <label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('username') ?></label>
        <div class="form-kh-input">
            <input type="number" name="phone" class="form-kh-in" placeholder="Số điện thoại"><br>

        </div><label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('phone') ?></label>
        <div class="form-kh-input">
            <input type="text" name="email" class="form-kh-in" placeholder="Email"><br>

        </div><label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('email') ?></label>
        <div class="form-kh-input">
            <input type="text" name="address" class="form-kh-in" placeholder="Địa chỉ"><br>
        </div><label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('address') ?></label>
        <div class="form-kh-input">
            <input type="text" name="" class="form-kh-in" placeholder="Mã giảm giá">
        </div>
        <input type="hidden" name="sumdh" value="<?= $tongdonhang ?>">
        <div class="form-kh-input">
            <div class=" form-kh-input-radio">
                <input type="radio" name="pttt">
                <p>Chưa có thẻ</p>
                <input type="radio" name="pttt">
                <p>Thẻ member</p>
                <input type="radio" name="pttt">
                <p>Thẻ vip</p>
            </div>
        </div>
        <div class="form-kh-button">
            <button type="submit" name="btn-submit" class="form-kh-but">
                <h4>Đặt Hàng</h4>
                <p>Nhận hàng và thanh toán Tại nhà</p>
            </button>
        </div>
        <div class="form-kh-button">
            <button type="submit" class="form-kh-butt">
                <h4>Thanh Toán Online</h4>
                <p>Bằng thẻ ATM, VISA, MASTER</p>
            </button>
        </div>
    </form>
</div>