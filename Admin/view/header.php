<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../style/bootstrap/js/jquyj.js"></script>
    <script src="../style/bootstrap/js/popper.min.js"></script>
    <script src="../style/bootstrap/js/jsbootstrap.min.js"></script>
    <script src="../style/bootstrap/js/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .header {
            height: 100vh;
        }

        .image {
            height: 190px;
            line-height: 190px;
        }
        .content{
            margin: 0 0 0 315px;
        }
        .imagedm {
            width: 150px;
            height: 150px;
            line-height: 150px;
        }

        .image_acc {
            width: 100px;
        }
        .mgtop{
            margin-top:35px;
        }
        ul {
            position: static;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark header position-fixed">
                <div class="text-center my-4">
                    <?php if (isset($_SESSION['login'])) {
                        extract($_SESSION['login']);
                    ?>
                        <a href="./index.php"><img src="../upload/<?= $image_account ?>" class="img-fluid rounded-circle w-50 text-center" alt=""></a>
                    <?php } ?>
                    <p class="text-light mt-2">Chào <?= $user ?> mừng bạn trở lại</p>
                </div>
                <nav class="navbar">
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end  pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Danh Mục
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=adddm">Thêm Danh Mục</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=listdm">Danh Sách Danh Mục</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=tkspdm">Thống Kê Danh Mục</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning mt-3 w-100 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Sản Phẩm
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=addsp">Thêm Sản Phẩm</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=listsp">Danh Sách Sản Phẩm</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=thunggiac">Thùng Giác</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Khách Hàng
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=listkh">Danh Sách Khách Hàng</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Đơn Hàng
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=listdh">Danh Sách Đơn Hàng</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=doanhthu">Thông Kê Đơn Hàng</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Bình Luận
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=listbl">Danh Sách Bình Luận</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=dsblan">Bình Luận Đã Ẩn</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tài Khoản
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=taikhoan">Cập nhật tài khoản</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=doimktk">Đổi mật khẩu</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-10 content">
                <div class="bg-dark p-2 text-end position-fixed" style="margin-left:-15px;width:1610px;z-index:999;">
                    <a href="../index.php" class="text-light text-none me-5"><i class="fa-solid fa-right-from-bracket fs-5 me-5"></i></a>
                </div>