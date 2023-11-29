<?php
ob_start();
session_start();
include 'view/header.php';
include '../model/pdo.php';
include '../model/danhmucsp.php';
include '../model/taikhoan.php';
include '../model/sanpham.php';
include '../model/thongke.php';
include '../model/binhluan.php';
include '../model/donhang.php';
$list_thongke = thongke_category_products();
$list_bl = thongke_comment_product();
$list_order = thongke_order_user();
$list_view_category = thongke_view_product_category();
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['btn-submit'])) {
                $error = [];
                if (empty($_POST['name-category'])) {
                    $error['name-category'] = 'Vui lòng nhập tên danh mục';
                } else {
                    $name_category = $_POST['name-category'];
                }
                if (empty($_POST['link'])) {
                    $error['link'] = 'Vui lòng điền đường dẫn tĩnh';
                } else {
                    $form_control = $_POST['link'];
                }
                $filename = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error['image'] = 'Bạn chưa upload ảnh';
                }

                $parent_category = $_POST['parent-category'];

                if (empty($error)) {
                    insert_category($filename, $name_category, $form_control, $parent_category);
                }
            }
            $loaddm = load_category();
            include './QLDM/add.php';
            break;
        case 'listdm':
            $load_all_category_children = load_category();
            include './QLDM/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
            }
            $load_one_category = load_category_update($id);
            if (isset($_POST['btn-submit'])) {
                $error = [];
                if (empty($_POST['name-category'])) {
                    $error['name-category'] = 'Vui lòng nhập tên danh mục';
                } else {
                    $name_category = $_POST['name-category'];
                }
                if (empty($_POST['link'])) {
                    $error['link'] = 'Vui lòng điền đường dẫn tĩnh';
                } else {
                    $form_control = $_POST['link'];
                }
                $id_category = $_POST['id_category'];
                $filename = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);

                if ($_FILES['image']['name'] == '') {
                    $filename = $load_one_category['image_category'];
                } else {
                    $filename = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }

                $parent_category = $_POST['parent-category'];

                if (empty($error)) {
                    update_category($id_category, $filename, $name_category, $form_control, $parent_category);
                }
            }
            $loaddm = load_category();

            include './QLDM/update.php';
            break;
        case 'deletedm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_product_category = load_product_category($id);
                if (!empty($load_product_category)) {
                    echo "<script>alert('Bạn không thể xóa khi danh mục còn sản phẩm')</script>";
                    $load_all_category_children = load_category();
                    include './QLDM/list.php';
                } else {
                    delete_category($id);
                    header('Location: index.php?act=listdm');
                }
            }
            break;
        case 'addsp':
            if (isset($_POST['btn-submit'])) {
                $error = [];
                if (empty($_POST['name_product'])) {
                    $error['name_product'] = 'Vui lòng nhập tên sản phẩm';
                } else {
                    $name_product = $_POST['name_product'];
                }

                if (empty($_POST['quantity_product'])) {
                    $error['quantity_product'] = 'Vui lòng điền số lượng';
                } else {
                    $quantity_product = $_POST['quantity_product'];
                }

                if (empty($_POST['origin_price'])) {
                    $error['origin_price'] = 'Vui lòng điền giá gốc';
                } else {
                    $origin_price = $_POST['origin_price'];
                }

                if (empty($_POST['discount_product'])) {
                    $error['discount_product'] = 'Vui lòng điền giá khuyến mãi';
                } else {
                    $discount_product = $_POST['discount_product'];
                }
                if (empty($_POST['describe'])) {
                    $error['describe'] = 'Vui lòng nhập mô tả';
                } else {
                    $describe = $_POST['describe'];
                }

                $date_product = $_POST['date_product'];
                $category_product = $_POST['id_category'];
                $filename = $_FILES['image']['name'];
                $filenames = $_FILES['images']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error['image'] = 'Bạn chưa upload ảnh';
                }

                if (empty($error)) {
                    inser_product($category_product, $name_product, $date_product, $filename, $describe, $quantity_product, $origin_price, $discount_product);
                }

                //Lấy hết dữ liệu ở bảng product
                $bien = try_image();
                $id_pro = $bien[0]['id_product'];
                foreach ($filenames as $key => $value) {
                    $target_files = $target_dir . $value;
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_files);
                    try_product_image($id_pro, $value);
                }
            }
            $listdm = load_category();
            include './QLSP/add.php';
            break;
        case 'listsp':
            if(isset($_POST['btns-search'])){
                $search = $_POST['search'];
            }else{
                $search = '';
            }
            $listsps = loadAll_productAdmin($search);
            $listdm = load_category();
            include 'QLSP/list.php';
            break;
        case 'deletemsp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deletem_product($id);
                header('Location: index.php?act=listsp');
            }
            break;
        case 'khoiphucsp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                kp_product($id);
                header('Location: index.php?act=listsp');
            }
            break;
        case 'thunggiac':
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
            }else{
                $search = '';
            }
            $listtg = loadtg_product($search);
            include 'QLSP/thunggiac.php';
            break;
        case 'deletesp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_product($id);
                header('Location: index.php?act=listsp');
            }
            break;
        case 'suasp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $load_one_product = load_product_update($id);
            if (isset($_POST['btn-submit'])) {
                $error = [];
                if (empty($_POST['name_product'])) {
                    $error['name_product'] = 'Vui lòng nhập tên sản phẩm';
                } else {
                    $name_product = $_POST['name_product'];
                }
                if (empty($_POST['quantity_product'])) {
                    $error['quantity_product'] = 'Vui lòng điền số lượng';
                } else {
                    $quantity_product = $_POST['quantity_product'];
                }
                if (empty($_POST['origin_price'])) {
                    $error['origin_price'] = 'Vui lòng điền giá gốc';
                } else {
                    $origin_price = $_POST['origin_price'];
                }
                if (empty($_POST['discount_product'])) {
                    $error['discount_product'] = 'Vui lòng điền giá khuyến mãi';
                } else {
                    $discount_product = $_POST['discount_product'];
                }
                if (empty($_POST['describe'])) {
                    $error['describe'] = 'Vui lòng nhập mô tả';
                } else {
                    $describe = $_POST['describe'];
                }
                $id_product = $_POST['id_product'];
                $date_product = $_POST['date_product'];

                $category_product = $_POST['parent-product'];

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);

                if ($_FILES['image']['name'] == '') {
                    $filename = $load_one_product['image_product'];
                } else {
                    $filename = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                }

                $parent_product = $_POST['parent-product'];
                if (empty($error)) {
                    update_product($id_product, $category_product, $name_product, $date_product, $filename, $describe, $quantity_product, $origin_price, $discount_product);
                }
            }
            $loaddm = load_category();
            $listdm = load_category();
            include './QLSP/update.php';
            break;
        case 'tkspdm':
            if(isset($_POST['btn-search'])){
                $search = $_POST['search'];
            }else{
                $search = '';
            }
            $list_thongke = thongke_category_product($search);
            include 'THONGKE/sanpham.php';
            break;
        case 'listspdm':
            if (isset($_GET['id'])) {
                $id_product = $_GET['id'];
            }
            $list_product_category = list_product_category($id_product);
            include './QLDM/listproduct.php';
            break;
        case 'listkh':
            if (isset($_POST['btn-search'])) {
                $search = $_POST['search'];
            } else {
                $search = '';
            }
            $load_all_account = load_kh_account($search);
            $load_nn_account = load_nn_account($search);
            include './QLKH/list.php';
            break;
        case 'updatekh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $idupdate = $_GET['idupdate'];
                if ($idupdate == 0) {
                    $idupdate = 2;
                } else {
                    if ($idupdate == 2) {
                        $idupdate = 0;
                    }
                }
                update_role_account($id, $idupdate);
            }
            header('Location: index.php?act=listkh');
            break;
        case 'deletekh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_account($id);
            }
            header('Location: index.php?act=listkh');
            break;
        case 'listbl':
            $listbl = thongke_comment_product();
            include './QLBL/listBlSp.php';
            break;
        case 'listblsp':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $list_comment_product = list_comment_product($id);
            include './THONGKE/binhluan.php';
            break;
        case 'anbl':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            an_comment_product($id);
            header('Location: index.php?act=listbl');
            break;
        case 'listtg':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $listtg_comment_product = listtg_comment_product($id);
            include './QLBL/thunggiac.php';
            break;
        case 'dsblan':
            $listblan_comment_product = listblan_comment_product();
            include './QLBL/listBlAll.php';
            break;
        case 'kpbl':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $kp_comment_product = kp_comment_product($id);
            header('Location: index.php?act=dsblan');
            break;
        case 'listdh':
            $listdh = list_order();
            include './QLDH/list.php';
            break;
        case 'listspcart':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $load_account_order = list_account_order($id);
            $load_pro_order = load_product_order($id);
            include './QLDH/listProOder.php';
            break;
        case 'upStaOrder':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $name_status = $_POST['status_order'];
            }
            break;
    }
}else{
    include 'view/home.php';
}

include 'view/footer.php';
