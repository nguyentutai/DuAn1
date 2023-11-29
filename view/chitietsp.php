
<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Chi tiết sản phẩm</a>
    </div>
</div>
<?php extract($load_ct_product) ?>
<!-- Stast chi tiết sản phẩm -->
<div class="product-detal container">
    <form method="post" action="index.php?act=addtocart" class="product-detal-body">
    <input type="hidden" name="id_product" value="<?= $id_product ?>">
        <div class="product-detal-image">
            <div class="image-detal">
                <img src="./upload/<?= $image_product ?>" alt="" />
                <input type="hidden" name="image_product" value="<?= $image_product ?>">
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
                <input type="hidden" name="name_product" value="<?= $name_product ?>">
            </div>
            <div class="product-detal-price">
                <div class="product-detal-price-sell">
                    <h3><?= $price ?></h3>
                    <input type="hidden" name="discount" value="<?= $price ?>">
                </div>
                <div class="product-detal-price-tree">
                    <del><?= $discount ?></del>
                    <input type="hidden" name="price" value="<?= $discount ?>">
                </div>
                <div class="percent">
                    <p>-<?= $phantram ?>%</p>
                </div>
            </div>
            <input class="soluong" type="number" value="1" min="1" max="<?= $quantity_product ?>" name="soluong">
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
                <button type="submit" name="btn-submit" class="cart">
                    <div class="giohang-b">GIỎ HÀNG</div>
                </button>
            </div>
            <a href="" class="buynow">
                <div class="muangay-b">MUA NGAY</div>
            </a>
        </div>
    </div>


</div>
<div class="product-detal-comment">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                    $("#comment").load("view/binhluan/binhluanform.php", {id_account: <?=$id?>});
            });
        </script>
        <div class="row" id="comment">
            
        </div>
</div>