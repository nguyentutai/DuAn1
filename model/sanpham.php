<?php
function inser_product($id_category, $name_product, $date_product, $filename, $describe, $quantity_product, $origin_price, $discount_product)
{
    $sql = "INSERT INTO `product`(`id_category`,`name_product`,`date_add`,`image_product`, `describe_product`, `quantity_product`, `cost_product`, `discount_product`) 
                                VALUES ('$id_category','$name_product','$date_product','$filename','$describe','$quantity_product','$origin_price','$discount_product')";
    pdo_execute($sql);
}

function try_image()
{
    $sql = "SELECT * From product order by id_product DESC";
    return pdo_query($sql);
}

function try_product_image($bienjday, $value)
{
    $sql = "INSERT INTO `product_image`(`id_product`, `name_image`) VALUES ('$bienjday','$value')";
    pdo_execute($sql);
}

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
function loadAll_product($search,$iteam_per_page,$current_page)
{
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount from product  WHERE status_product = 0
    ORDER BY `id_product` ASC LIMIT $iteam_per_page OFFSET $current_page";
    if ($search != "") {
        $sql .= " AND name_product LIKE '%" . $search . "%'";
    }
    return pdo_query($sql);
}

function count_product(){
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
function  list_product_category($id_product)
{
    $sql = "SELECT * FROM `product` WHERE `id_category` = '$id_product'";
    return pdo_query($sql);
}
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
function load_pro_image($id){
    $sql = "SELECT * FROM `product_image` WHERE id_product = '$id'";
    return pdo_query($sql);
}
function load_product_ct($id){
    $sql = "SELECT *, (100 - CEILING((discount_product)/(cost_product)*100)) as phantram,CONCAT(FORMAT(discount_product, 0), ' đ') as price, CONCAT(FORMAT(cost_product, 0), ' đ') as discount FROM `product` WHERE id_product = '$id'";
    return pdo_query_one($sql);
}
function inser_product_view($id){
    $sql = "UPDATE `product` SET `veiw_product`= veiw_product+1 WHERE id_product = '$id'";
    pdo_execute($sql);
}