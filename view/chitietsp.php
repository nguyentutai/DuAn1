<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Chi tiết sản phẩm</a>
    </div>
</div>
<?php extract($load_ct_product);  ?>
<div class="product-detal container">
    <div class="product-detal-body">
        <div class="product-detal-image">
            <div class="image-detal">
                <img src="./upload/<?= $image_product ?>" alt="" />
            </div>
            <div class="image-detal-chidrent">
                <?php foreach ($image_ct_image as $image) {
                    extract($image); ?>
                    <div class="image-chidrent">
                        <img src="./upload/<?= $name_image ?>" alt="" />
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="product-detal-content">
            <div class="product-detal-title">
                <h3><?= $name_product ?></h3>
            </div>
            <div class="product-detal-price">
                <div class="product-detal-price-sell">
                    <h3><?= $price ?></h3>
                </div>
                <div class="product-detal-price-tree">
                    <del><?= $discount ?></del>
                </div>
                <div class="percent">
                    <p>-<?= $phantram ?>%</p>
                </div>
            </div>
            <div class="product-detal-parameter">
                <p>Xuất xứ: Nhật Bản</p>
                <p>Đường kính mặt: 38mm</p>
                <p>Chống nước: 10ATM</p>
            </div>
            <div class="product-detal-servis">
                <div class="mpgh">
                    <div class="mpgh-image">
                        <img src="./image/freeship.png" alt="" />
                    </div>
                </div>
                <div class="doitra">
                    <div class="doitra-image">
                        <img src="./image/doitra.png" alt="" />
                    </div>
                </div>
                <div class="chihang">
                    <div class="chihang-image">
                        <img src="./image/baohanh.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="shopping">
                <a href="" class="tragop">
                    <div class="tragop-b">MUA TRẢ GÓP</div>
                </a>
                <a href="" class="cart">
                    <div class="giohang-b">GIỎ HÀNG</div>
                </a>
            </div>
            <a href="" class="buynow">
                <div class="muangay-b">MUA NGAY</div>
            </a>
        </div>
    </div>
    <div class="list_comment_pro">
        
    </div>
</div>