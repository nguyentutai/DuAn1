<?php
//Load danh mục
function load_category()
{
    $sql = "SELECT * FROM `category`";
    return pdo_query($sql);
}
//Add danh mục
function insert_category($image_category, $name_category,$link_category, $parent_id)
{
    $sql = "INSERT INTO `category`(`image_category`, `name_category`, `link_category`, `parent_id`) VALUES ('$image_category','$name_category','$link_category','$parent_id')";
    pdo_execute($sql);
}
//List danh mục sản phẩm
function load_category_childrent($id=0){
    $sql = "SELECT * FROM `category`";
    if($id != ''){
        $sql.=" WHERE `parent_id` = '$id'";
    }else{
        $sql.= " WHERE `parent_id` = 0";
    }
    return pdo_query($sql);
}
function load_category_update($id){
    $sql = "SELECT * FROM `category` WHERE `id_category` = '$id'";
    return pdo_query_one($sql);
}