<?php
function inser_product($filename, $describe, $quantity_product, $origin_price, $discount_product)
{
    $sql = "INSERT INTO `product`(`image_product`, `describe_product`, `quantity_product`, `cost_product`, `discount_product`) 
                                VALUES ('$filename','$describe','$quantity_product','$origin_price','$discount_product')";
    pdo_execute($sql);
}
