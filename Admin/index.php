<?php
ob_start();
session_start();
include 'view/header.php';
include '../model/pdo.php';
include '../model/danhmucsp.php';
include '../model/taikhoan.php';
include '../model/sanpham.php';

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
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
            } else {
                $id = 0;
            }
            $load_all_category_children = load_category_childrent($id);
            include './QLDM/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
            }
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
            $load_one_category = load_category_update($id);
            include './QLDM/update.php';
            break;
        case 'deletedm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $load_product_category = load_product_category($id);
                if (!empty($load_product_category)) {
                    echo "Bạn không thể xóa";
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
                $category_product = $_POST['category_product'];
                $filename = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error['image'] = 'Bạn chưa upload ảnh';
                }

                if (empty($error)) {
                    inser_product($filename, $describe, $quantity_product, $origin_price, $discount_product);
                }
            }
            include './QLSP/add.php';
            break;
        case 'listsp':

            include 'QLSP/list.php';
            break;
        case 'listkh':
            if(isset($_POST['btn-search'])){
                $search = $_POST['search'];
            }else{
                $search = '';
            }
            $load_all_account = load_all_account($search);
            include './QLKH/list.php';
            break;
    }
}

include 'view/footer.php';
