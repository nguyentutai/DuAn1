<?php 
    //Thống kê sản phẩm theo danh mục
    function thongke_category_product($search){
        $sql = "Select dm.id_category, dm.name_category, count(*) as soluongsp FROM category dm JOIN product sp ON dm.id_category=sp.id_category WHERE status_product = 0";

        if($search != ""){
            $sql .= " AND name_category LIKE '%" . $search . "%' GROUP BY dm.id_category, dm.name_category ORDER BY soluongsp DESC";
        }else{
            $sql .= " GROUP BY dm.id_category, dm.name_category ORDER BY soluongsp DESC";
        }
        return pdo_query($sql);
    }

    function thongke_category_products(){
        $sql = "Select dm.id_category, dm.name_category, count(*) as soluongsp FROM category dm JOIN product sp ON dm.id_category=sp.id_category WHERE status_product = 0 AND parent_id != 0 GROUP BY dm.id_category, dm.name_category ORDER BY soluongsp DESC";
        return pdo_query($sql);
    }
    //Thống kê bình luận theo sản phẩm
    function thongke_comment_product(){
        $sql = "select *, count(comment.id_comment) as soBinhLuan from product 
        join comment on comment.id_product = product.id_product
        group by product.id_product order by product.id_product desc";
        return pdo_query($sql);
    }
    //Thống kê đơn hàng theo user
    function thongke_order_user(){
        $sql = "SELECT *,COUNT(id_order) as soLuong FROM `order` INNER JOIN account ON `order`.id_account = account.id_account GROUP BY `order`.id_account";
        return pdo_query($sql);
    }
?>