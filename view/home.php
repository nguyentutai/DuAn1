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
                        <li><a href="?act=allproduct&iddm=<?= $id_category ?>"><?= $name_category ?></a></li>
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
                <a href="?act=allproduct&iddm=<?= $id_category ?>"><img src="upload/<?= $image_category ?>" alt=""></a>
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
            <?php foreach ($load_pro_buy as $list) { ?>
                <div href="?act=chitietsp&id=<?= $list['id_product'] ?>" class="product-sell">
                    <div class="product-sell-image">
                        <img src="./upload/<?= $list['image_product'] ?>" alt="">
                    </div>
                    <div class="product-sell-bot">
                        <div class="product-sell-content">
                            <h3><?= $list['name_product']  ?></h3>
                        </div>
                        <div class="product-sell-price">
                            <p><?= number_format($list['discount_product'], 0, ',', '.') . ' đ' ?></p>
                        </div>
                        <div class="heart">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
        <?php
        $mergedArray = [];
        $loaddmch = load_product_man();
        foreach ($loaddmch as $key) {
            $acc = load_product_mans($key[0]);
            $mergedArray = array_merge($mergedArray, $acc);
        }
        $firstTenElements = array_slice($mergedArray, 0, 10);
        foreach ($firstTenElements as $keyt) {
        ?>
            <a href="index.php?act=chitietsp&id=<?= $keyt['id_product'] ?>" class="product-man">
                <div class="product-man-image">
                    <img src="./upload/<?= $keyt['image_product'] ?>" alt="">
                </div>
                <div class="product-man-bot">
                    <div class="product-man-content">
                        <h3><?= $keyt['name_product'] ?></h3>
                    </div>
                    <div class="product-man-dis">
                        <p><del><?= $keyt['discount'] ?></del></p>
                    </div>
                    <div class="product-man-price">
                        <p><?= $keyt['price'] ?></p>
                    </div>
                    <div class="heart-man percent">
                        <p>-<?= $keyt['phantram'] ?>%</p>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
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
        <?php
        $mergedArray = [];
        $loaddmch = load_product_wife();
        foreach ($loaddmch as $key) {
            $acc = load_product_wifes($key[0]);
            $mergedArray = array_merge($mergedArray, $acc);
        }
        $firstTenElements = array_slice($mergedArray, 0, 10);
        foreach ($firstTenElements as $keyt) {
        ?>
            <a href="index.php?act=chitietsp&id=<?= $keyt['id_product'] ?>" class="product-man">
                <div class="product-man-image">
                    <img src="./upload/<?= $keyt['image_product'] ?>" alt="">
                </div>
                <div class="product-man-bot">
                    <div class="product-man-content">
                        <h3><?= $keyt['name_product'] ?></h3>
                    </div>
                    <div class="product-man-dis">
                        <p><del><?= $keyt['discount'] ?></del></p>
                    </div>
                    <div class="product-man-price">
                        <p><?= $keyt['price'] ?></p>
                    </div>
                    <div class="heart-man">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
</div>
</div>
</div>