<?php 
    //Thêm sản phẩm vào đơn hàng
    function add_order($id_account,$email,$username,$phone,$address,$sumdh,$code_order){
        $sql = "INSERT INTO `order`(`id_account`, `email`, `name_recipient`, `phone_recipient`, `address_recipient`, `sum_money`, `code_orders`) 
        VALUES ('$id_account','$email','$username','$phone','$address','$sumdh','$code_order')";
        pdo_execute($sql);
    }
    //Lẫy id đơn hàng vừa up
    function load_id_order(){
        $sql = "SELECT id_order FROM `order` ORDER BY id_order DESC";
        return pdo_query($sql);
    }
    //Thêm vào bảng chi tiết đơn hàng
    function add_order_dh($id_norder,$id_pro,$sl,$dg){
        $sql = "INSERT INTO `detail_dh`(`id_order`, `id_product`, `quanlity_detail`, `unit_price`) 
        VALUES ('$id_norder','$id_pro','$sl','$dg')";
        pdo_execute($sql);
    }
    //List order đơn hàng
    function list_order(){
        $sql = "SELECT `detail_dh`.`id_order`, SUM(`detail_dh`.`unit_price`) AS total_unit_price, account.user, name_recipient, phone_recipient, address_recipient, code_orders,email
        FROM `order`
        INNER JOIN `detail_dh` ON `order`.`id_order` = `detail_dh`.`id_order`
        INNER JOIN `account` ON `account`.`id_account` = `order`.`id_account`
        GROUP BY `detail_dh`.`id_order`";
        return pdo_query($sql);
    }

    //load product theo đơn hàng
    function load_product_order($id){
        $sql = "SELECT * FROM `detail_dh` JOIN product ON detail_dh.id_product = product.id_product WHERE id_order = '$id'";
        return pdo_query($sql);
    }

    // Load accout order
    function list_account_order($id){
        $sql = "SELECT * FROM `order` WHERE id_order = '$id'";
        return pdo_query($sql);
    }

    //Cập nhật trạng thái của đơn hàng
    function update_status_order($id_order,$status){
        $sql = "UPDATE `order` SET `id_status`='$status' WHERE id_order = '$id_order'";
        pdo_execute($sql);
    }
?>