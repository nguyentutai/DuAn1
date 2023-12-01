<?php
//Thêm sản phẩm 
function inser_product($id_category, $name_product, $date_product, $filename, $describe, $quantity_product, $origin_price, $discount_product)
{
    $sql = "INSERT INTO `product`(`id_category`,`name_product`,`date_add`,`image_product`, `describe_product`, `quantity_product`, `cost_product`, `discount_product`) 
                                VALUES ('$id_category','$name_product','$date_product','$filename','$describe','$quantity_product','$origin_price','$discount_product')";
    pdo_execute($sql);
}
//Lấy lại id sản phẩm vừa thêm
function try_image()
{
    $sql = "SELECT * From product order by id_product DESC";
    return pdo_query($sql);
}
//Thêm ảnh phụ của sản phẩm
function try_product_image($bienjday, $value)
{
    $sql = "INSERT INTO `product_image`(`id_product`, `name_image`) VALUES ('$bienjday','$value')";
    pdo_execute($sql);
}
//Sửa sản phẩm
function update_product($id_product, $id_category, $name_product, $date_product, $image_product, $describe, $quantity_product, $origin_price, $discount_product)
{
    $sql = "UPDATE `product` SET `id_category`='$id_category',`name_product`='$name_product',`date_add`='$date_product',`image_product`='$image_product',`describe_product`='$describe',`quantity_product`='$quantity_product',`cost_product`='$origin_price',`discount_product`='$discount_product' WHERE `id_product` = '$id_product'";
    pdo_execute($sql);
}

//Load sản phẩm theo danh mục
function load_product_category($id)
{
    $sql = "SELECT * FROM `product` WHERE `id_category` = '$id'";
    return pdo_query($sql);
}
//Load sản phẩm trong trang admin
function loadAll_productAdmin($search)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount from product  WHERE status_product = 0";
    if ($search != "") {
        $sql .= " AND name_product LIKE '%" . $search . "%'";
    }
    return pdo_query($sql);
}
function loadAll_product($search, $iddm, $filter_price, $min, $max)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, 
    CONCAT(FORMAT(cost_product, 0), ' đ') as discount from product WHERE status_product = 0";

    if ($search != "") {
        $sql .= " AND name_product LIKE '%" . $search . "%' LIMIT 30";
    }
    //Lọc sản phẩm theo danh mục
    if ($iddm != '') {
        $sql .= " AND id_category = '$iddm' LIMIT 30";
    }
    //Sắp xếp sản phẩm theo giá
    if ($filter_price != '') {
        $sql .= " ORDER BY discount_product $filter_price LIMIT 30";
    }
    //Lọc sản phẩm theo khoảng giá
    if (($min != "") && ($max != '')) {
        $sql .= " AND discount_product BETWEEN $min AND $max LIMIT 30";
    }
    return pdo_query($sql);
}

function count_product()
{
    $sql = "SELECT COUNT(*) as soSp FROM `product`";
    return pdo_query($sql);
}
function loadtg_product($search)
{
    $sql = "SELECT * from product WHERE status_product = 1";
    if ($search != "") {
        $sql .= " AND name_product LIKE '%" . $search . "%'";
    }
    return pdo_query($sql);
}
// List sản phẩm theo danh mục
function  list_product_category($id_product)
{
    $sql = "SELECT * FROM `product` WHERE `id_category` = '$id_product'";
    return pdo_query($sql);
}

//Xóa sản phẩm
function delete_product($id)
{
    $sql = "DELETE FROM `product` WHERE `id_product`='$id'";
    pdo_execute($sql);
}
//Xóa mềm sản phẩm
function deletem_product($id)
{
    $sql = "UPDATE `product` SET `status_product`='1' WHERE id_product = '$id'";
    pdo_execute($sql);
}

//Khôi phục sản phẩm
function kp_product($id)
{
    $sql = "UPDATE `product` SET `status_product`='0' WHERE id_product = '$id'";
    pdo_execute($sql);
}
function load_product_update($id)
{
    $sql = "SELECT * FROM `product` WHERE `id_product` = '$id'";
    return pdo_query_one($sql);
}

//Load sản phẩm home
//Load sản phẩm danh mục đồng hồ nam
function load_product_man()
{
    $sql = "SELECT * 
    FROM `category` 
    WHERE `id_category` = 10 Or `parent_id` = 10";
    return pdo_query($sql);
}
function load_product_mans($load)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount
    FROM `product` 
    WHERE `id_category` = '$load'";
    return pdo_query($sql);
}
//Load sản phẩm danh mục đồng hồ nữ
function load_product_wife()
{
    $sql = "SELECT * 
    FROM `category` 
    WHERE `id_category` = 2 Or `parent_id` = 2";
    return pdo_query($sql);
}
function load_product_wifes($load)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount
    FROM `product` 
    WHERE `id_category` = '$load'";
    return pdo_query($sql);
}

//Load ảnh phụ của sản phẩm
function load_pro_image($id)
{
    $sql = "SELECT * FROM `product_image` WHERE id_product = '$id' LIMIT 3";
    return pdo_query($sql);
}

//Load chi tiết sản phẩm
function load_product_ct($id)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, 
    CONCAT(FORMAT(cost_product, 0), ' đ') as discount FROM `product` WHERE id_product = '$id'";
    return pdo_query_one($sql);
}

//Update lượt xem sản phẩm
function inser_product_view($id)
{
    $sql = "UPDATE `product` SET `veiw_product`= veiw_product+1 WHERE id_product = '$id'";
    pdo_execute($sql);
}

//Load sản phẩm bán chạy
function load_product_buyrun()
{
    $sql = "SELECT * FROM `detail_dh` JOIN product ON detail_dh.id_product = product.id_product LIMIT 5";
    return pdo_query($sql);
}
//Đánh giá sản phẩm
function evalue_pro($id, $content_eva, $rating, $id_account, $date)
{
    $sql = "INSERT INTO `evaluate`(`id_account`, `id_product`, `content_avaluate`, `rating`, `date_eva`) VALUES ('$id_account','$id','$content_eva','$rating',CURDATE())";
    pdo_execute($sql);
}
//Thống kê rating sản phẩm
function thongke_evalue($id)
{
    $sql = "SELECT id_product, rating, COUNT(*) AS rating_count
    FROM evaluate WHERE id_product = '$id'
    GROUP BY id_product, rating
    HAVING COUNT(*) > 1 UNION SELECT id_product, rating, COUNT(*) AS rating_count
    FROM evaluate WHERE id_product = '$id'
    GROUP BY id_product, rating
    HAVING COUNT(*) = 1";
    return pdo_query($sql);
}
//List đánh giá
function list_evalue($id)
{
    $sql = "SELECT * FROM `evaluate` JOIN account ON evaluate.id_account = account.id_account WHERE id_product = '$id'";
    return pdo_query($sql);
}
//Kiểm tra đánh giá
function check_evalue($id_pro, $id_account)
{
    $sql = "SELECT * FROM `evaluate` WHERE id_account = '$id_account' AND id_product = '$id_pro'";
    return pdo_query($sql);
}
//Load sản phẩm có lượt xem nhiều
function load_pro_view()
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount
    FROM `product` 
   order by veiw_product DESC LIMIT 5";
    return pdo_query($sql);
}
function load_pro_cl($id,$iddm){
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, 
    CONCAT(FORMAT(cost_product, 0), ' đ') as discount FROM `product` WHERE id_category = '$iddm' AND id_product <> '$id'";
    return pdo_query($sql); 
}
//Cập nhật giá sản phẩm
function capnhatgia($id){
    $sql = "SELECT discount_product FROM ";
}