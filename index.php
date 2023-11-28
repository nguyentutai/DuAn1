<?php
session_start();
if (!isset($_SESSION['addToCard'])) {
    $_SESSION['addToCard'] = [];
}
ob_start();
include 'view/header.php';
include 'model/taikhoan.php';
include 'model/danhmucsp.php';
include 'model/sanpham.php';
include 'model/donhang.php';
include 'model/pdo.php';
$loaddm = load_category_home();
$load_pro_buy = load_product_buyrun();
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login':
            if (isset($_POST['btn-login'])) {
                $passRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
                $error = [];
                if (empty($_POST['username'])) {
                    $error['username'] = 'Vui lòng nhập thông tin tài khoản';
                } else {
                    $username = $_POST['username'];
                }
                if (empty($_POST['password'])) {
                    $error['password'] = 'Vui lòng nhập password';
                } else {
                    if (!preg_match($passRegex, $_POST['password'])) {
                        $error['password'] = 'Mật khẩu không hợp lệ';
                    } else {
                        $password = md5($_POST['password']);
                    }
                }
                //Kiểm tra nếu mảng $error rỗng thì thực hiện so sánh với database
                if (empty($error)) {
                    //Hàm thực hiện so sánh với database
                    $login = check_login($username, $password);
                    if (is_array($login)) {
                        $_SESSION['login'] = $login;
                        header('Location: index.php');
                    } else {
                        echo "<script>alert('Tài khoản không tồn tại');</script>";
                    }
                }
            }
            include 'view/login/login.php';
            break;
        case 'register':
            if (isset($_POST['btn-register'])) {
                $error = [];
                $passfim = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
                $phoneRegex = '/^0[1-9]\d{8}$/';
                //Kiểm tra username
                if (empty($_POST['username'])) {
                    $error['username'] = 'Vui lòng nhập thông tin tài khoản';
                } else {
                    //Thực hiện kiểm tra xem username nhập vào có tồn tại trên database hay không
                    $check_user = check_register($_POST['username']);
                    if (is_array($check_user)) {
                        $error['username'] = 'Tên tài khoản đã tồn tại';
                    } else {
                        $username = $_POST['username'];
                    }
                }
                //Kiểm tra password
                if (empty($_POST['password'])) {
                    $error['password'] = 'Vui lòng nhập password';
                } else {
                    if (!preg_match($passfim, $_POST['password'])) {
                        $error['password'] = 'Mật khẩu không đúng định dạng';
                    } else {
                        $password = $_POST['password'];
                    }
                }
                //Kiểm tra confirm pass
                if (empty($_POST['password-confim'])) {
                    $error['password-confirm'] = 'Vui lòng nhập Confirmpass';
                } else {
                    if (!preg_match($passfim, $_POST['password-confim'])) {
                        $error['password-confirm'] = 'Confirmpass không đúng định dạng';
                    } else {
                        if ($password != $_POST['password-confim']) {
                            $error['password-confirm'] = 'Confirmpass không giống với password';
                        } else {
                            $password_confirm = md5($_POST['password-confim']);
                        }
                    }
                }
                //Kiểm tra số điện thoại
                if (empty($_POST['phone'])) {
                    $error['phone'] = 'Vui lòng nhập số điện thoại';
                } else {
                    if (!preg_match($phoneRegex, $_POST['phone'])) {
                        $error['phone'] = 'Số điện thoại bạn nhập không hợp lệ';
                    } else {
                        $phone = $_POST['phone'];
                    }
                }
                //Kiểm tra email
                if (empty($_POST['email'])) {
                    $error['email'] = "Không được để trống email";
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Email không đúng định dạng";
                } else {
                    $email = $_POST['email'];
                }

                //Upload hình ảnh nếu có
                $filename = $_FILES['image']['name'];
                $target_dir = "upload/";
                //Thực hiện đẩy ảnh vào thư mục upload
                $target_file = $target_dir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error['image'] = 'Bạn chưa upload ảnh';
                }
                //Nếu mảng $error rỗng thì thực hiện insert dữ liệu lên database
                if (empty($error)) {
                    insert_register($username, $password_confirm, $filename, $email, $phone);
                    echo "<script>alert('Đăng kí thành công');</script>";
                    header('Location: ?act=login');
                }
            }
            include 'view/login/register.php';
            break;
        case 'logout':
            if (isset($_SESSION['login']) && isset($_SESSION['addToCard'])) {
                unset($_SESSION['login']);
                unset($_SESSION['addToCard']);
            }
            header('Location: index.php');
            break;

        case 'thongtintk':
            include 'view/thongtintk.php';
            break;
        case 'allproduct':
            if (isset($_POST['btn-submit'])) {
                $search = $_POST['search'];
            } else {
                $search = '';
            }
            if(isset($_GET['id'])){
                // $filter_price = $_POST['filter_price'];
                $filter_price = $_GET['id'];
            }else{
                $filter_price = "";
            }
            if(isset($_GET['iddm'])){
                $iddm = $_GET['iddm'];
            }else{
                $iddm = '';
            }

            if(isset($_GET['max'])){
                $max = $_GET['max'];
                $min = $_GET['min'];
            }else{
                $max = '';
                $min = '';
            }

            $loadsp = loadAll_product($search,$iddm,$filter_price,$min,$max);
            $load_product_parent = load_category_parent();
            $load_category_home = load_category_home();
            include 'view/allproduct.php';
            break;
        case 'capnhattt':
            if (isset($_POST['btn-submit'])) {
                $id = $_POST['id_ac'];
                $name_ac = $_POST['name_ac'];
                $email_ac = $_POST['email_ac'];
                $phone_ac = $_POST['phone_ac'];

                $filename = $_FILES['image']['name'];
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);

                if ($_FILES['image']['name'] == '') {
                    $filename = $_SESSION['login']['image_account'];
                } else {
                    $filename = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }
                update_account($id, $name_ac, $filename, $email_ac, $phone_ac);
                echo "<script>alert('Cập nhật thông tin tài khoản thành công');</script>";
            }
            include "view/thongtintk.php";
            break;
        case "changepass":
            if (isset($_POST['btns-submit'])) {
                $error = [];
                $idtk = $_POST['idtk'];
                if (isset($_SESSION['login'])) {
                    if (empty($_POST['passold'])) {
                        $error['passold'] = "Vui lòng nhập passold";
                    } else {
                        if ($_SESSION['login']['pass'] != md5($_POST['passold'])) {
                            $error['passold'] = "Mật khẩu của bạn không chính xác";
                        } else {
                            $passold = $_POST['passold'];
                        }
                    }

                    if (empty($_POST['passnew'])) {
                        $error['passnew'] = "Vui lòng nhập password mới";
                    } else {
                        if ($_POST['passnew'] == $_POST['passold']) {
                            $error['passnew'] = "Mật khẩu bạn trùng với mật khấu cũ";
                        }
                    }

                    if (empty($_POST['passconfim'])) {
                        $error['passconfim'] = "Vui lòng nhập passconfim";
                    } else {
                        if ($_POST['passnew'] != $_POST['passconfim']) {
                            $error['passconfim'] = "Mật khẩu bạn nhập không khớp";
                        } else {
                            $passconfim = md5($_POST['passconfim']);
                        }
                    }
                }
                if (empty($error)) {
                    doimk_taikhoan($idtk, $passconfim);
                    echo "<script>alert('Đổi mật khẩu thành công. Vui lòng đăng nhập lại');</script>";
                }
            }
            include "view/thongtintk.php";
            break;
        case "chitietsp":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $inser_view = inser_product_view($id);
            $image_ct_image = load_pro_image($id);
            $load_ct_product = load_product_ct($id);
            include "view/chitietsp.php";
            break;
        case "addtocart":
            if (isset($_POST["btn-submit"])) {
                $id = $_POST["id_product"];
                $image_product = $_POST["image_product"];
                $name_product = $_POST["name_product"];
                $discount = $_POST["discount"];
                $price = (int)str_replace([' ', ',', 'đ'], '', $_POST["price"]);
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
                header('Location: ?act=addtocart');
            }
            include "view/cart.php";
            break;
        case "deletecard":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                array_splice($_SESSION['addToCard'], $_GET['id'], 1);
            }
            header('location: index.php?act=addtocart');
            break;
        case "deleteallcard":
            unset($_SESSION["addToCard"]);
            header('location: index.php');
            break;
        case 'addorder':
            if (isset($_POST['btn-submit'])) {
                $error = [];
                //Lấy dữ liệu tạo đơn hàng
                if (empty($_POST['username'])) {
                    $error['username'] = 'Vui lòng nhập thông tin user';
                } else {
                    $username = $_POST['username'];
                }
                if (empty($_POST['phone'])) {
                    $error['phone'] = 'Vui lòng nhập thông tin phone';
                } else {
                    $phone = $_POST['phone'];
                }
                if (empty($_POST['email'])) {
                    $error['email'] = 'Vui lòng nhập thông tin email';
                } else {
                    $email = $_POST['email'];
                }
                if (empty($_POST['address'])) {
                    $error['address'] = 'Vui lòng nhập thông tin địa chỉ';
                } else {
                    $address = $_POST['address'];
                }
                if (isset($_SESSION['login'])) {
                    $id_account = $_SESSION['login']['id_account'];
                }else{
                    $error['script'] = '<script>alert("Vui lòng đăng nhập để đặt hàng");</script>';
                }
                $sumdh = $_POST['sumdh'];
                $code_order = "#" . rand(0, 9999);
                
                if (empty($error)) {
                    add_order($id_account, $email, $username, $phone, $address, $sumdh, $code_order);
                    $id_order = load_id_order();
                    $id_norder = $id_order[0]['id_order'];
                    foreach($_SESSION['addToCard'] as $key) {
                        add_order_dh($id_norder,$key[0],$key[5],$key[6]);
                    }
                }
            }
            include "view/cart.php";
            break;
    }
} else {
    include 'view/home.php';
}

include 'view/footer.php';
