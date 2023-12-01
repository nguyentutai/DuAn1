<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Mua Ngay</a>
    </div>
</div>
<div class="product-cart container-cart">
    <div class="list-product-cart">
        <div class="image-product-cart">
            <img src="./upload/<?= $_SESSION['buynow'][1] ?>" alt="" />
        </div>
        <div class="content-product-cart">
            <div class="name-product-cart">
                <h3><?= $_SESSION['buynow'][2] ?></h3>
            </div>
            <div class="pri-quantity">
                <div class="soluong">
                    <p>Số lượng sản phẩm</p>
                </div>
                <div class="quantity-product-cart">
                    <div class="ct-quantity">
                        <p><span id="quantity"><?= $_SESSION['buynow'][5] ?></span></p>
                    </div>
                    <div class="price-product-cart">
                        <p><span id="price"><?= number_format($_SESSION['buynow'][6], 0, ',', '.') . ' đ' ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-kh container-cart">
    <h2>Thông Tin Khách Hàng</h2>
    <label style="color: red;font-size:15px;margin-top:5px;margin-left:120px;font-weight:bold;"><?= is_error('script') ?></label>
    <form action="index.php?act=addbuynow" class="form-kh-1" method="post">
        <input type="hidden" name="id_product" value="<?= $_SESSION['buynow'][0] ?>">
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
        <input type="hidden" name="sumbuynow" value="<?= $_SESSION['buynow'][6] ?>">
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