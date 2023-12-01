<?php
if (isset($_POST["btn-submit"])) {
    $id = $_POST["id_product"];
    $image_product = $_POST["image_product"];
    $name_product = $_POST["name_product"];
    $discount = $_POST["discount"];
    $price = (int)str_replace([' ', ',', 'đ'], '', $_POST["discount"]);
    $quantity_product = $_POST['soluong'];
    $thanhtien = $price * $quantity_product;
    //Tạo biến kiểm tra
    $checksp = false;
    foreach ($_SESSION['addToCard'] as $key => $item) {
        //Kiểm tra sản ohaamr đã có chưa
        if ($item[0] == $id) {
            $checksp = true;
            $_SESSION['addToCard'][$key][5] += $quantity_product;
            $_SESSION['addToCard'][$key][6] += $thanhtien;
            break;
        }
    }
    if (!$checksp) { // Nếu sản phẩm chưa tồn tại
        $addCart = [$id, $image_product, $name_product, $discount, $price, $quantity_product, $thanhtien];
        array_push($_SESSION['addToCard'], $addCart);
    }
    echo "<script>
            alert('Thêm giỏ hàng thành công');
            window.location.href = 'index.php?act=addtocart';
        </script>";
}
if (isset($_POST['btn-buynows'])) {
    $id = $_POST["id_product"];
    $image_product = $_POST["image_product"];
    $name_product = $_POST["name_product"];
    $discount = $_POST["discount"];
    $price = (int)str_replace([' ', ',', 'đ'], '', $_POST["discount"]);
    $quantity_product = $_POST['soluong'];
    $thanhtien = $price * $quantity_product;

    $buynow = [$id, $image_product, $name_product, $discount, $price, $quantity_product, $thanhtien];
    $_SESSION['buynow'] = $buynow;
    header('Location: ?act=buynow');
}
?>

<div class="container-directional">
    <div class="directional container">
        <a href=""><i class="fa-solid fa-house"></i> Trang chủ /</a>
        <a href="">Chi tiết sản phẩm</a>
    </div>
</div>
<?php extract($load_ct_product) ?>
<!-- Stast chi tiết sản phẩm -->
<div class="product-detal container">
    <form method="post" action="" class="product-detal-body">
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
                <?= $describe_product ?>
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
            <button class="buynow" type="submit" name="btn-buynows">
                <div class="muangay-b">MUA NGAY</div>
            </button>
            <div class="uudai">
                <div class="title-uudai">
                    <p>Ưu đãi dự kiến áp dụng</p>
                </div>
                <div class="content-uudai">
                    <div class="content-uudai1">
                        <i class="fa-solid fa-check"></i>
                        <p>Điều kiện giảm 10% mua kèm Bút bi cao cấp</p>
                    </div>
                    <div class="content-uudai2">
                        <i class="fa-solid fa-check"></i>
                        <p>Giảm thêm 5% cho thành viên có thẻ Member</p>
                    </div>
                    <div class="content-uudai3">
                        <i class="fa-solid fa-check"></i>
                        <p>Giảm thêm 10% cho thành viên có thẻ VIP</p>
                    </div>
                </div>
            </div>
        </div>
    </form>




</div>

</div>
<div class="content-bl-dg container">
    <div class="content-evalue">
        <div class="title-evalue">
            <h3>Đánh Giá Sản Phẩm</h3>
        </div>
        <div class="bieudo-evalua">
            <?php if (!empty($thongke_dg)) { ?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <div id="chart_div">
                    <script>
                        google.charts.load('current', {
                            packages: ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(drawAnnotations);

                        function drawAnnotations() {
                            var data = google.visualization.arrayToDataTable([
                                ['City', 'Đánh giá'],
                                <?php foreach ($thongke_dg as $tk) {
                                    extract($tk);
                                    echo "[$rating,$rating_count],";
                                }
                                ?>
                            ]);

                            var options = {
                                chartArea: {
                                    width: '50%',
                                },
                                annotations: {
                                    alwaysOutside: true,
                                    textStyle: {
                                        fontSize: 15,
                                        auraColor: 'none',
                                        color: '#000'
                                    },
                                    boxStyle: {
                                        stroke: '#000',
                                        strokeWidth: 3,
                                    }
                                }
                            };
                            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                        }
                    </script>
                </div>
            <?php } else { ?>
                <div class="no-evalua">
                    <h3>Sản phẩm này không có đánh giá</h3>
                </div>
            <?php } ?>
        </div>
        <?php foreach ($list_evalua as $list) {
            extract($list);
        ?>
            <div class="list-evalue">
                <div class="image-evalue">
                    <img src="./upload/<?= $image_account ?>" alt="">
                </div>
                <div class="name-rating">
                    <div class="name-evalue">
                        <h4><?= $user ?></h4>
                    </div>
                    <div class="rating-evalue">
                        <?php
                        switch ($rating) {
                            case "5":
                                echo "<p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    ";
                                break;
                            case "4":
                                echo "<p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p>&#9733;<p>
                                    ";
                                break;
                            case "3":
                                echo "<p class='color-rating'>&#9733;<p>
                                        <p class='color-rating'>&#9733;<p>
                                        <p class='color-rating'>&#9733;<p>
                                        <p>&#9733;<p>
                                        <p>&#9733;<p>
                                        ";
                                break;
                            case "2":
                                echo "<p class='color-rating'>&#9733;<p>
                                    <p class='color-rating'>&#9733;<p>
                                    <p>&#9733;<p>
                                    <p>&#9733;<p>
                                    <p>&#9733;<p>
                                    ";
                                break;
                            case "1":
                                echo "<p class='color-rating'>&#9733;<p>
                                        <p>&#9733;<p>
                                        <p>&#9733;<p>
                                        <p>&#9733;<p>
                                        <p>&#9733;<p>
                                        ";
                                break;
                        }
                        ?>
                    </div>
                    <div class="content-rating">
                        <p><?= $content_avaluate ?></p>
                    </div>
                </div>
                <div class="date-evalue">
                    <p>( <?= $date_eva ?> )</p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="content-comment">
        <div class="list-comment">
            <div class="title-comment">
                <h3>Bình luận sản phẩm</h3>
            </div>
            <div class="from-bl">
                <form action="index.php?act=chitietsp&id=<?= $id_product ?>" method="POST">
                    <input type="hidden" name="id_pro" value="<?= $id_product ?>">
                    <input type="text" name="binhluan" placeholder="Nhập nội dung bình luận tại đây ...">
                    <button name="gui-bl" type="submit">Gửi Bình Luận</button>
                    <span style="color:red;margin-top:5px;font-weight:bold;"><?= is_error('binhluan') ?></span>
                </form>
            </div>
            <?php foreach ($load_comment_pro as $listbl) {
                extract($listbl);
            ?>
                <div class="nd-comment">
                    <div class="image-evalue">
                        <img src="./upload/<?= $image_account ?>" alt="">
                    </div>
                    <div class="name-rating">
                        <div class="name-evalue">
                            <h4><?= $user ?></h4>
                        </div>
                        <div class="content-rating">
                            <p><?= $content_comment ?></p>
                        </div>
                        <div class="go-bl">
                            <?php if (isset($_SESSION['login'])) {
                                if ($_SESSION['login']['id_account'] == $id_account) {
                            ?>
                                    <a href="index.php?act=deletebl&id=<?= $id_comment ?>&id_sp=<?= $id_product ?>">Thu hồi</a>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="date-evalue">
                        <p>( <?= $date_comment ?> )</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="list-pro-samekind container">
    <div class="top-view-pro">
        <div class="title-category-man">
            <h3>SẢN PHẨM CÙNG LOẠI</h3>
        </div>
        <div class="box-category-cl">
            <?php
            foreach ($load_pro_cl as $keyt) {
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
</div>