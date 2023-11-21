<?php

include 'view/header.php';
include '../model/pdo.php';
include '../model/danhmucsp.php';
include '../model/taikhoan.php';

if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if(isset($_POST['btn-submit'])){
                $error = [];
                if(empty($_POST['name-category'])){
                    $error['name-category'] = 'Vui lòng nhập tên danh mục';
                }else{
                    $name_category = $_POST['name-category'];
                }
                if(empty($_POST['link'])){
                    $error['link'] = 'Vui lòng điền đường dẫn tĩnh';
                } else{
                    $form_control = $_POST['link'];
                }
                $filename = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error['image'] = 'Bạn chưa upload ảnh';
                }

                $parent_category = $_POST['parent-category'];
                
                if(empty($error)){
                    insert_category($filename,$name_category,$form_control,$parent_category);
                }
            }
            $loaddm = load_category();
            include './QLDM/add.php';
            break;
        case 'listdm':

            include './QLDM/list.php';
            break;
        case 'addsp':

            include './QLSP/add.php';
            break;
        case 'listsp':

            include 'QLSP/list.php';
            break;
    }
}

include 'view/footer.php';
