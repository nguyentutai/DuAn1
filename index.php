<?php
session_start();
ob_start();
include 'view/header.php';
include 'model/taikhoan.php';
include 'model/danhmucsp.php';
include 'model/pdo.php';
$loaddm = load_category_home();
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
            if(isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
            header('Location: index.php');
            break;
            case "sanphamct":
                include 'view/chitietsp.php';
                break;
        
    }
} else {
    include 'view/home.php';
}

include 'view/footer.php';
