<?php
session_start();
if (!isset($_SESSION['addToCard'])) {
    $_SESSION['addToCard'] = [];
}
if (!isset($_SESSION['buynow'])) {
    $_SESSION['buynow'] = [];
}
if (!isset($_SESSION['buyOnline'])) {
    $_SESSION['buyOnline'] = [];
}
ob_start();
include 'view/header.php';
include 'model/taikhoan.php';
include 'model/danhmucsp.php';
include 'model/binhluan.php';
include 'model/sanpham.php';
include 'model/donhang.php';
include 'model/pdo.php';
$loaddm = load_category_home();
$load_pro_buy = load_product_buyrun();
$load_pro_view = load_pro_view();


if (isset($_GET['message']) && strpos($_GET['message'], 'Successful') !== false) {
    if (isset($_SESSION['login'])) {
        $id_account = $_SESSION['login']['id_account'];
    }
    $code_order = "#" . rand(0, 9999);
    add_order($id_account, $_SESSION['buyOnline'][2], $_SESSION['buyOnline'][0], $_SESSION['buyOnline'][1], $_SESSION['buyOnline'][3], $_SESSION['buyOnline'][4], $code_order);
    $get_id_order = load_id_order();
    $id_order = $get_id_order[0]['id_order'];
    foreach ($_SESSION['addToCard'] as $key) {
        add_order_dh($id_order, $key[0], $key[5], $key[6]);
    }
    unset($_SESSION['buyOnline']);
    include "view/buyOnline.php";
    // header('Location: index.php');
}



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
                    $check_user = check_register($_POST['username'], $_POST['email']);
                    if (is_array($check_user)) {
                        $error['username'] = '<script>alert("Tên tài khoản hoặc email đã tồn tại");</script>';
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
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                // $error['image'] = 'Bạn chưa upload ảnh';
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
                unset($_SESSION['buyOnline']);
            }
            header('Location: index.php');
            break;
        case 'quenmatkhau':
            $email = $_POST['info_email'];
            $searchName = searchName($email);
            if (isset($_POST['restorePass'])) {
                if ($searchName == true) {
                    $searchName = searchName($email);
                    $tokenEmail = password_hash($email, PASSWORD_DEFAULT);
                    changePassEmail($email, $tokenEmail);
                } else {
                    echo '<div style="width:100%; text-align:center; padding-top:75px">
                                <img src="assets/img/404.svg" width="50%" alt="">
                            </div>';
                    break;
                }
            }
            include 'view/quenmatkhau.php';
            break;
        case 'restorePass':
            include 'view/restorePass.php';
            break;
        case 'thongtintk':
            if (isset($_SESSION['login'])) {
                $id_account = $_SESSION['login']['id_account'];
            }
            $load_order_account = load_order_account($id_account);
            include 'view/thongtintk.php';
            break;
        case 'allproduct':
            if (isset($_POST['btn-submit'])) {
                $search = $_POST['search'];
            } else {
                $search = '';
            }

            if (isset($_GET['id'])) {
                // $filter_price = $_POST['filter_price'];
                $filter_price = $_GET['id'];
            } else {
                $filter_price = "";
            }

            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = '';
            }

            if (isset($_GET['max'])) {
                $max = $_GET['max'];
                $min = $_GET['min'];
            } else {
                $max = '';
                $min = '';
            }

            $loadsp = loadAll_product($search, $iddm, $filter_price, $min, $max);
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
                $newAccount = [
                    $id,
                    $name_ac,
                    $filename,
                    $email_ac,
                    $phone_ac,
                ];
                if (isset($_SESSION['login'])) {
                    for ($i = 0; $i < count($_SESSION['login']); $i++) {
                        $_SESSION['login'][$i] = $newAccount[$i];
                    }
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

              

                    echo "<script>
                    alert('Đổi mật khẩu thành công');
                    window.location.href = 'index.php';
                </script>";

                }
            }
            if (isset($_SESSION['login'])) {
                $id_account = $_SESSION['login']['id_account'];
            }
            $load_order_account = load_order_account($id_account);
            include "view/thongtintk.php";
            break;
        case "chitietsp":
            if (isset($_POST['gui-bl'])) {
                $error = [];
                $id = $_POST['id_pro'];
                if (empty($_POST['binhluan'])) {
                    $error['binhluan'] = "Vui lòng nhập nội dung bình luận";
                } else {
                    $binhluan = $_POST['binhluan'];
                }
                if (!isset($_SESSION['login'])) {

                  

                    $error['binhluan'] = "<script>alert('Vui lòng đăng nhập để bình luận');</script>";

                } else {
                    $id_account = $_SESSION["login"]["id_account"];
                }
                if (empty($error)) {
                    insert_comment($binhluan, $id, $id_account);
                }
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $load_ct_product = load_product_ct($id);
            $iddm = $load_ct_product['id_category'];
            $load_pro_cl = load_pro_cl($id, $iddm);
            $load_comment_pro = list_comment_product($id);
            $list_evalua = list_evalue($id);
            $thongke_dg = thongke_evalue($id);
            $inser_view = inser_product_view($id);
            $image_ct_image = load_pro_image($id);


            include "view/chitietsp.php";
            break;
        case "addtocart":
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
                header('Location: ?act=addtocart');
            }

            include "view/chitietsp.php";
            break;
        case "addtocart":

            include "view/cart.php";
            break;
        case "deletecard":
            if (isset($_GET['id'])) {
                array_splice($_SESSION['addToCard'], $_GET['id'], 1);
            } else {
                $_SESSION['addToCard'] = [];
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
                } else {

                   

                    $error['script'] = "<script>
                        alert('Vui lòng đăng nhập để đặt hàng');
                        window.location.href = 'index.php?act=login';
                    </script>";
                }
                if (!isset($_SESSION["addToCard"]) || empty($_SESSION["addToCard"])) {
                    $error['script'] = "<script>
                        alert('Bạn không thể đặt hàng khi chưa có sản phẩm trong giỏ hàng !');
                        window.location.href = 'index.php';
                    </script>";

                }
                $sumdh = $_POST['sumdh'];
                $code_order = "#" . rand(0, 9999);
                if (empty($error)) {
                    //Thêm dữ liệu lên db Order
                    add_order($id_account, $email, $username, $phone, $address, $sumdh, $code_order);
                    //Lấy lại cái id_order vừa thêm
                    $get_id_order = load_id_order();
                    $id_order = $get_id_order[0]['id_order'];
                    //Thêm lên bảng detail dh
                    foreach ($_SESSION['addToCard'] as $key) {
                        add_order_dh($id_order, $key[0], $key[5], $key[6]);
                    }
                    unset($_SESSION['addToCard']);
                    echo "<script>
                        alert('Bạn đã đặt hàng thành công');
                        window.location.href = 'index.php';
                    </script>";
                }
            }
            include "view/cart.php";
            break;
        case "buynow":
            include "view/buynow.php";
            break;
        case "addbuynow":
            if (isset($_POST['btn-submit'])) {
                $error = [];
                //Lấy dữ liệu tạo đơn hàng
                if (isset($_SESSION['login'])) {
                    $id_account = $_SESSION['login']['id_account'];
                } else {
                    $error['script'] = '<script>alert("Vui lòng đăng nhập để đặt hàng");</script>';
                }
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

                $sumbuynow = $_POST['sumbuynow'];
                $code_order = "#" . rand(0, 9999);
                if (empty($error)) {
                    //Thêm dữ liệu lên db Order
                    add_order($id_account, $email, $username, $phone, $address, $sumbuynow, $code_order);
                    //Lấy lại cái id_order vừa thêm
                    $id_order = load_id_order();
                    $id_norder = $id_order[0]['id_order'];

                    foreach ($_SESSION['addToCard'] as $key) {
                        add_order_dh($id_norder, $key[0], $key[5], $key[6]);
                    }
                    echo "<script>alert('Bạn đã đặt hàng thành công')</script>";
                    header("Location: index.php");

                    //Thêm lên bảng detail dh
                    if (isset($_SESSION['buynow'])) {
                        add_order_dh($id_norder, $_SESSION['buynow'][0], $_SESSION['buynow'][5], $_SESSION['buynow'][6]);
                    }
                    echo "<script>
                        alert('Bạn đã đặt hàng thành công');
                        window.location.href = 'index.php?act=thongtintk';
                    </script>";

                }
            }
            include "view/buynow.php";
            break;
        case "chitietOrder":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $load_product_order = load_product_order($id);
            include "view/chitietdonhang.php";
            break;
        case "evaluate":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            $load_pro = load_product_ct($id);
            if (isset($_POST['btn-submit'])) {
                $id = $_POST['id_pro'];
                $content_eva = $_POST['nd-evalue'];
                $rating = $_POST['rating'];
                if (isset($_SESSION['login'])) {
                    $id_account = $_SESSION['login']['id_account'];
                }
                $date = date('m-d-Y');
                $check_elalua = check_evalue($id, $id_account);
                if (empty($check_elalua)) {
                    evalue_pro($id, $content_eva, $rating, $id_account, $date);
                    echo "<script>alert('Đánh giá sản phẩm thành công');</script>";
                } else {
                    echo "<script>alert('Bạn đã đánh giá sản phẩm rồi');</script>";
                }
            }
            include "view/evaluate.php";
            break;
        case "deletebl":
            if (isset($_GET["id"]) && isset($_GET['id_sp'])) {
                $id = $_GET["id"];
                $id_pro = $_GET['id_sp'];
            }
            delete_comment($id);
            header("Location: index.php?act=chitietsp&id=$id_pro");
            break;
        case "deleteOrder":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            deleteOrder($id);
            deleteDetailOrder($id);
            header("Location: index.php?act=thongtintk");
            break;
        case "buynow":
            if (isset($_GET['id'])) {
                $id_product = $_GET['id'];
            }
            
            $load_pro_buynow = load_product_ct($id_product);
            include "view/buynow.php";
            break;
        case "addbuynow":
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
                } else {
                    $error['script'] = '<script>alert("Vui lòng đăng nhập để đặt hàng");</script>';
                }
                $sumbuynow = $_POST['sumbuynow'];
                $id_pro = $_POST['id_pro'];
                $soluong = $_POST['soluong'];
                $code_order = "#" . rand(0, 9999);
                if (empty($error)) {
                    add_order($id_account, $email, $username, $phone, $address, $sumbuynow, $code_order);
                    $id_order = load_id_order();
                    $id_norder = $id_order[0]['id_order'];
                    add_order_dh($id_norder, $id_pro, $soluong, $sumbuynow);
                    echo "<script>alert('Bạn đã đặt hàng thành công')</script>";
                    header("Location: index.php");
                }
                
            }
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            header("Location: index.php?act=buynow&id=$id");
            break;
        case "chitietOrder":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $load_product_order = load_product_order($id);
            include "view/chitietdonhang.php";
            break;
        case "evaluate":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            $load_pro = load_product_ct($id);
            if (isset($_POST['btn-submit'])) {
                $id = $_POST['id_pro'];
                $content_eva = $_POST['nd-evalue'];
                $rating = $_POST['rating'];
                if (isset($_SESSION['login'])) {
                    $id_account = $_SESSION['login']['id_account'];
                }
                $date = date('m-d-Y');
                $check_elalua = check_evalue($id, $id_account);
                if (empty($check_elalua)) {
                    evalue_pro($id, $content_eva, $rating, $id_account, $date);
                    echo "<script>alert('Đánh giá sản phẩm thành công');</script>";
                } else {
                    echo "<script>alert('Bạn đã đánh giá sản phẩm rồi');</script>";
                }
            }
            include "view/evaluate.php";
            break;
        case "deletebl":
            if (isset($_GET["id"]) && isset($_GET['id_sp'])) {
                $id = $_GET["id"];
                $id_pro = $_GET['id_sp'];
            }
            delete_comment($id);
            header("Location: index.php?act=chitietsp&id=$id_pro");
            break;
        case "deleteOrder":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            deleteOrder($id);
            deleteDetailOrder($id);
            header("Location: index.php?act=thongtintk");
            break;
    }
} else {
    include 'view/home.php';
}

include 'view/footer.php';
