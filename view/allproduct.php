<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="?act=allproduct">Đồng hồ</a>
    </div>
</div>
<div class="container-all container">
    <div class="list-category-fa">
        <ul>
            <?php foreach ($load_product_parent as $loaddm) {
                extract($loaddm);
            ?>
                <li><a href="?act=allproduct"><?= $name_category ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="list-category-children">
        <div class="list-category-children-image">
            <?php foreach ($load_category_home as $loaddm) {
                extract($loaddm);
            ?>
                <div class="categry-children-image">
                    <a href="?act=allproduct&iddm=<?= $id_category ?>"><img src="./upload/<?= $image_category ?>" alt=""></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="filter-price">
        <div class="price_k">
            <a href="?act=allproduct&id=DESC">Giá giảm dần</a>
        </div>
        <div class="price_k">
            <a href="?act=allproduct&id=ASC">Giá tăng dần</a>
        </div>
    </div>
    <div class="khoang_price">
        <div class="price_k">
            <a href="?act=allproduct&min=0&max=2000000">Dưới 2 triệu</a>
        </div>
        <div class="price_k">
            <a href="?act=allproduct&min=2000000&max=4000000">Từ 2 - 4 triệu</a>
        </div>
        <div class="price_k">
            <a href="?act=allproduct&min=4000000&max=15000000">Từ 4 - 15 triệu</a>
        </div>
        <div class="price_k">
            <a href="?act=allproduct&min=15000000&max=300000000">Trên 15 triệu</a>
        </div>
    </div>
</div>
<div class="list-product-all container">
    <div class="list-product-max">
        <?php 
        $list_30_pro = array_splice($loadsp,0,30);
        foreach ($list_30_pro as $listsp) {
            extract($listsp); ?>
            <a href="?act=chitietsp&id=<?= $id_product ?>" class="list-product">
                <div class="list-product-image">
                    <img src="./upload/<?= $image_product ?>" alt="">
                </div>
                <div class="list-product-bot">
                    <div class="list-product-content">
                        <h3><?= $name_product ?></h3>
                    </div>
                    <div class="list-product-dis">
                        <p><del><?= $discount ?></del></p>
                    </div>
                    <div class="list-product-price">
                        <p><?= $price ?></p>
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
        <?php } ?>
    </div>
</div>