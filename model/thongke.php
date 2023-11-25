<?php 
    //Thống kê sản phẩm theo danh mục
    function thongke_category_product(){
        $sql = "Select dm.id_category, dm.name_category, count(*) as soluongsp FROM category dm JOIN product sp ON dm.id_category=sp.id_category 
        GROUP BY dm.id_category, dm.name_category ORDER BY soluongsp DESC";
        return pdo_query($sql);
    }
    //Thống kê bình luận theo sản phẩm
    function thongke_comment_product(){
        $sql = "select *, count(comment.id_comment) as soBinhLuan from product 
        join comment on comment.id_product = product.id_product
        group by product.id_product order by product.id_product desc";
        return pdo_query($sql);
    }
?>