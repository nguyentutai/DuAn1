<?php 
    //Thêm sản phẩm vào đơn hàng
    function add_order($id_account,$email,$username,$phone,$address,$sumdh,$code_order){
        $sql = "INSERT INTO `order`(`id_account`, `email`, `name_recipient`, `phone_recipient`, `address_recipient`, `sum_money`, `code_orders`,`date_order`) 
        VALUES ('$id_account','$email','$username','$phone','$address','$sumdh','$code_order',CURDATE())";
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
        $sql = "SELECT `detail_dh`.`id_order`, SUM(`detail_dh`.`unit_price`) AS total_unit_price, account.user,id_status,name_recipient, phone_recipient, address_recipient, code_orders,email
        FROM `order`
        INNER JOIN `detail_dh` ON `order`.`id_order` = `detail_dh`.`id_order`
        INNER JOIN `account` ON `account`.`id_account` = `order`.`id_account`
        GROUP BY `detail_dh`.`id_order`";
        return pdo_query($sql);
    }

    //load product theo đơn hàng
    function load_product_order($id){
        $sql = "SELECT * FROM `detail_dh` JOIN product ON detail_dh.id_product = product.id_product 
        JOIN `order` ON detail_dh.id_order = `order`.`id_order`
        WHERE detail_dh.id_order = '$id'";
        return pdo_query($sql);
    }

    // Load accout order
    function list_account_order($id){
        $sql = "SELECT * FROM `order` WHERE id_order = '$id'";
        return pdo_query($sql);
    }
    //Load order theo account
    function load_order_account($id){
        $sql = "SELECT * FROM `order` WHERE id_account = '$id'";
        return pdo_query($sql);
    }
    //load status order
    function list_status_order(){
        $sql = "SELECT * FROM `status`";
        return pdo_query($sql);
    }
    //Update status order
    function update_status_order($id_order,$status){
        $sql = "UPDATE `order` SET `id_status`='$status' WHERE id_order = '$id_order'";
        pdo_execute($sql);
    }
    //Xóa và hủy đơn hàng
    function deleteOrder($id){
        $sql = "DELETE FROM `order` where id_order = '$id'";
        pdo_execute($sql);
    }
    function deleteDetailOrder($id){
        $sql = "DELETE FROM `detail_dh` where id_order = '$id'";
        pdo_execute($sql);
    }
    function thongke_order_date(){
        $sql = "SELECT *,SUM(sum_money) as sum FROM `order` where id_status = 5 GROUP BY date(date_order)";
        return pdo_query($sql);
    }
    function thongke_order_tc(){
        $sql = "SELECT COUNT(id_status) as soluong FROM `order` WHERE id_status = 5 GROUP BY id_status";
        return pdo_query($sql);
    }
    function thongke_order_xn(){
        $sql = "SELECT COUNT(id_status) as soluong FROM `order` WHERE id_status = 1 GROUP BY id_status";
        return pdo_query($sql);
    }
    function doanhthu(){
        $sql = "SELECT SUM(sum_money) as doanhthu FROM `order` WHERE id_status = 5 GROUP BY id_status";
        return pdo_query($sql);
    }
?>