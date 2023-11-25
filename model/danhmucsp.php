<?php
//Load danh mục
function load_category()
{
    $sql = "SELECT * FROM `category`";
    return pdo_query($sql);
}
function load_category_home()
{
    $sql = "SELECT * FROM `category` WHERE parent_id != 0";
    return pdo_query($sql);
}
//Add danh mục
function insert_category($image_category, $name_category,$link_category, $parent_id)
{
    $sql = "INSERT INTO `category`(`image_category`, `name_category`, `link_category`, `parent_id`) VALUES ('$image_category','$name_category','$link_category','$parent_id')";
    pdo_execute($sql);
}

function update_category($id_category,$image_category, $name_category, $link_category, $parent_id){
    $sql = "UPDATE `category` SET `image_category`='$image_category',`name_category`='$name_category',`link_category`=' $link_category',`parent_id`='$parent_id' WHERE `id_category` = '$id_category'";
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
//Xóa danh mục sản phẩm
function delete_category($id){
    $sql = "DELETE FROM `category` WHERE `id_category`='$id'";
    pdo_execute($sql);
}
function load_category_update($id){
    $sql = "SELECT * FROM `category` WHERE `id_category` = '$id'";
    return pdo_query_one($sql);
}