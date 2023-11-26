<div class="container-dm container">
    <div class="container-dm-children">
        <div class="slide-category">
            <div class="list-category-header" id="clickshow">
                <i class="fa-solid fa-bars"></i>
                <h3>Danh Mục Sản Phẩm</h3>
            </div>
            <div class="menu-category" id="menushow">
                <ul>
                    <?php foreach ($loaddm as $row) {
                        extract($row);
                    ?>
                    <li><a href="<?= $link_category ?>"><?= $name_category ?></a></li>
                    <?php } ?>
                    
                </ul>
            </div>
            <script>
                $(document).ready(function() {
                    $("#clickshow").click(function() {
                        $("#menushow").slideToggle();
                    });

                    function hiden() {
                        $("#menushow").slideUp();
                    }
                    $(window).resize(function() {
                        hiden();
                    });
                    $(window).scroll(function() {
                        hiden();
                    });
                });
            </script>
        </div>
        <div class="chuchay">
            <marquee behavior="" direction="">TD Watch Chào mừng quý khách</marquee>
        </div>
    </div>
</div>
<div class="container-1 container">
    <div class="banner">
        <div class="banner-image">
            <div class="silde">
                <img src="image/banner1.png" id="slide" alt="">
            </div>
            <div class="next">
                <button class="next-image" onclick="next()"><i class="fa-solid fa-angle-right"></i></button>
            </div>
            <div class="back">
                <button class="pre-image" onclick="back()"><i class="fa-solid fa-angle-left"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="container-2 container">
    <div class="list-category-image">
        <?php foreach ($loaddm as $row) {
            extract($row);
        ?>
            <div class="categry-image">
                <a href="<?= $link_category ?>"><img src="upload/<?= $image_category ?>" alt=""></a>
            </div>
        <?php } ?>
    </div>
</div>
<div class="container-3 container">
    <div class="fa-product-sell">
        <div class="title-product-sell">
            <h3>SẢN PHẨM BÁN CHẠY</h3>
        </div>
        <div class="list-product-sell">
            <!-- List 10 sản phẩm bán chạy -->
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
            <div class="product-sell">
                <div class="product-sell-image">
                    <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
                </div>
                <div class="product-sell-bot">
                    <div class="product-sell-content">
                        <h3>Aries Gold AG-G9005AS-S</h3>
                    </div>
                    <div class="product-sell-price">
                        <p>10.150.000đ</p>
                    </div>
                    <div class="heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="see-more">
            <div class="title-more"><a href="index.php?act=allproduct">Xem thêm</a></div>
        </div>
        <div class="next-product">
            <i class="fa-solid fa-angle-right"></i>
        </div>
        <div class="pre-product">
            <i class="fa-solid fa-angle-left"></i>
        </div>
    </div>
</div>
<div class="container-4 container">
    <div class="title-category-man">
        <h3>Đồng hồ Nam</h3>
    </div>
    <div class="box-category-man">
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner-sale container">
    <div class="banner-image">
        <img src="./image/banner5.jpg" alt="">
    </div>
</div>

<div class="container-5 container container-woman">
    <div class="title-category-man">
        <h3>Đồng hồ Nữ</h3>
    </div>
    <div class="box-category-man">
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="product-man">
            <div class="product-man-image">
                <img src="image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="product-man-bot">
                <div class="product-man-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="product-man-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="product-man-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="heart-man">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>