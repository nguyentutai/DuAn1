<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Đồng hồ</a>
    </div>
</div>
<div class="container-all container">
    <div class="list-category-fa">
        <ul>
            <?php foreach ($load_product_parent as $loaddm) {
                extract($loaddm);
            ?>
                <li><a href="index.php?act=loaddmall<?= $id_category ?>"><?= $name_category ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="list-category-children">
        <div class="list-category-children-image">
            <?php foreach ($load_category_home as $loaddm) {
                extract($loaddm);
            ?>
                <div class="categry-children-image">
                    <a href="<?= $link_category ?>"><img src="./upload/<?= $image_category ?>" alt=""></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="filter-price">
        <form action="" method="post">
            <select name="" id="">
                <option value="desc">Giá tăng dần</option>
                <option value="asc">Giá giảm dần</option>
            </select>
        </form>
    </div>
</div>
<div class="list-product-all container">
    <div class="list-product-max">
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="./image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
        <a href="" class="list-product">
            <div class="list-product-image">
                <img src="../image/dong-ho-chinh-hang-phien-ban-gioi-han1-1896924675.jpg" alt="">
            </div>
            <div class="list-product-bot">
                <div class="list-product-content">
                    <h3>Aries Gold AG-G9005AS-S</h3>
                </div>
                <div class="list-product-dis">
                    <p><del>12.150.000đ</del></p>
                </div>
                <div class="list-product-price">
                    <p>10.150.000đ</p>
                </div>
                <div class="list-product-content">
                    <p>Size mặt: 43mm</p>
                    <p>Loại máy: Automatic</p>
                    <p>Mặt kính: Kính Saphire</p>
                </div>
                <div class="heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
            </div>
        </a>
    </div>
</div>