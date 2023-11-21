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
