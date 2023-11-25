<?php
function inser_product($id_category, $name_product, $date_product, $filename, $describe, $quantity_product, $origin_price, $discount_product)
{
    $sql = "INSERT INTO `product`(`id_category`,`name_product`,`date_add`,`image_product`, `describe_product`, `quantity_product`, `cost_product`, `discount_product`) 
                                VALUES ('$id_category','$name_product','$date_product','$filename','$describe','$quantity_product','$origin_price','$discount_product')";
    pdo_execute($sql);
}

function update_product($id_product,$id_category, $name_product, $date_product,$image_product, $describe,$quantity_product,$origin_price, $discount_product)
{
    $sql = "UPDATE `product` SET `id_category`='$id_category',`name_product`='$name_product',`date_add`='$date_product',`image_product`='$image_product',`describe_product`='$describe',`quantity_product`='$quantity_product',`cost_product`='$origin_price',`discount_product`='$discount_product' WHERE `id_product` = '$id_product'";
    pdo_execute($sql);
}

//Load sản phẩm theo danh mục
function load_product_category($id)
{
    $sql = "SELECT * FROM `product` WHERE `id_product` = '$id'";
    return pdo_query($sql);
}
function loadAll_product()
{
    $sql = "select * from product where 1 order by id_product";
    $listsp = pdo_query($sql);
    return $listsp;
}
function  list_product_category($id_product){
    $sql = "SELECT * FROM `product` WHERE `id_category` = '$id_product'";
    return pdo_query($sql);
}
function delete_product($id)
{
    $sql = "DELETE FROM `product` WHERE `id_product`='$id'";
    pdo_execute($sql);
}
function load_product_update($id)
{
    $sql = "SELECT * FROM `product` WHERE `id_product` = '$id'";
    return pdo_query_one($sql);
}
