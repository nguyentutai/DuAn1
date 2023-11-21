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
    <style>
        .header {
            height: 100vh;
        }

        .image {
            height: 190px;
            line-height: 190px;
        }

        ul {
            position: static;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark header">
                <div class="text-center my-4">
                    <img src="../img/ảnh.jpg" class="img-fluid rounded-circle w-50 text-center" alt="">
                    <p class="text-light mt-2">Chào mừng bạn chở lại</p>
                </div>
                <nav class="navbar">
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end  pe-3">
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 text-dark fw-bold"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Danh Mục
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=adddm">Thêm Danh Mục</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=listdm">Danh Sách Danh Mục</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning mt-3 w-100 text-dark fw-bold"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Sản Phẩm
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?act=addsp">Thêm Sản Phẩm</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=listsp">Danh Sách Sản Phẩm</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Khách Hàng
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Danh Sách Khách Hàng</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản Lý Đơn Hàng
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="" class="btn btn-secondary bg-warning w-100 mt-3 text-dark fw-bold">Thống Kê</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>