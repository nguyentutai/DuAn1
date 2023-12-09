<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="image/image-gg.png" type="image/x-icon">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/reponsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TD Watch</title>
</head>

<body>
    <div id="wrapper">
        <!-- Start header -->
        <div id="header">
            <nav class="container">
                <div class="logo">
                    <a href="./index.php"><img src="image/logo.png" alt=""></a>
                </div>
                <div id="search">
                    <form action="?act=allproduct" class="search-form" method="post">
                        <input placeholder="Tìm kiếm ở đây..." type="text" name="search">
                        <button style="cursor: pointer;" id="icon-search" type='submit' name="btn-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="branch">
                    <i class="fa-solid fa-location-dot"></i>
                    <form action="">
                        <select>
                            <option value="0">Chọn chi nhánh</option>
                            <option value="1">Hà Nội</option>
                        </select>
                    </form>
                </div>
                <div id="menu">
                    <ul>
                        <li><i class="fa-solid fa-heart"></i><a href="?act=allproduct">Sản Phẩm</a></li>
                        <li class="cart_num"><i class="fa-solid fa-cart-shopping"></i><a href="?act=addtocart">Giỏ Hàng</a>
                            <span class="num_cart"><?php 
                                if(isset($_SESSION['addToCard'])){
                                    echo count($_SESSION['addToCard']);
                                }else{
                                    echo '0';
                                }
                            ?></span>
                        </li>
                        <?php
                        if (isset($_SESSION['login'])) {
                            extract($_SESSION['login']);
                            if ($_SESSION['login']['role'] == '0') {
                        ?>
                               <li class="function"><img class="account_image" src="./upload/<?= $image_account ?>" alt=""><a class="name_account" href=""><?= $user ?></a>
                                    <div class="admini">
                                        <ul>
                                            <li><i class="fa-solid fa-screwdriver-wrench" style="margin:0 10px;color:blue;"></i><a href="?act=thongtintk">Thông tin tài khoản</a></li>
                                            <li><i class="fa-solid fa-right-from-bracket" style="margin:0 10px;color:blue;"></i><a href="?act=logout">Đăng Xuất</a></li>
                                        </ul>
                                    </div>
                                </li>
                                    <!-- Dao diện người dùng đã đăng nhập -->
                                    <?php
                                } else {
                                    if ($_SESSION['login']['role'] == '1') {
                                    ?>
                                        <!-- Dao diện người quản trị đăng nhập -->
                                <li class="function"><img class="account_image" src="./upload/<?= $image_account ?>" alt=""><a class="name_account" href=""><?= $user ?></a>
                                    <div class="admini">
                                        <ul>
                                            <li><i class="fa-solid fa-screwdriver-wrench" style="margin:0 10px;color:blue;"></i><a href="./Admin/index.php">Quản Trị</a></li>
                                            <li><i class="fa-solid fa-right-from-bracket" style="margin:0 10px;color:blue;"></i><a href="?act=logout">Đăng Xuất</a></li>
                                        </ul>
                                    </div>
                                </li>
                        <?php
                                    }
                                }
                            } else {
                        ?>
                        <li class="account"><i class="fa-solid fa-user"></i><a href="?act=login">Tài khoản</a>
                            <div class="login-regis">
                                <ul>
                                    <li><i class="fa-solid fa-user-lock" style="margin:0 10px;color:blue;"></i><a href="?act=login">Đăng Nhập</a></li>
                                    <li><i class="fa-solid fa-user-plus" style="margin:0 10px;color:blue;"></i><a href="?act=register">Đăng Kí</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php
                            }
                    ?>

                    </ul>
                </div>
                <div id="navbar" class="navbar">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </nav>
        </div>
        <!-- Menu-repon -->
        <div id="load-menu">
            <div class="menu-repon">
                <div id="search-repon">
                    <form action="" class="search-form-repon">
                        <input placeholder="Tìm kiếm ở đây..." type="text">
                        <button id="icon-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="menu-reponsive">
                    <ul>
                        <li><i class="fa-solid fa-heart"></i><a href="">Yêu thích</a></li>
                        <li><i class="fa-solid fa-cart-shopping"></i><a href="">Giỏ hàng</a></li>
                        <li><i class="fa-solid fa-user"></i><a href="">Tài khoản</a></li>
                        <li><i class="fa-solid fa-list"></i><a href="">Danh mục</a>
                            <ul class="category-repon">
                                <li><a href="">Đồng hồ Casio</a></li>
                                <li><a href="">Đồng hồ Tsar Bomba</a></li>
                                <li><a href="">Đồng hồ Aries Gold</a></li>
                                <li><a href="">Đồng hồ Atlantic</a></li>
                                <li><a href="">Đồng hồ Philippe Auguste</a></li>
                                <li><a href="">Đồng hồ Citizen</a></li>
                                <li><a href="">Đồng hồ Orient</a></li>
                                <li><a href="">Đồng hồ Swatch</a></li>
                                <li><a href="">Đồng hồ Seiko</a></li>
                                <li><a href="">Đồng hồ Japan Brand</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="out-menu"></div>