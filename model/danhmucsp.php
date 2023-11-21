<?php
    //Load danh mục
    function load_category(){
        $sql = "SELECT * FROM `category`";
        return pdo_query($sql);
    }
    //Add danh mục
    function insert_category(){
        $sql = "INSERT INTO `category`(`image_category`, `name_category`, `parent_id`) VALUES ('[value-2]','[value-3]','[value-4]')";
        pdo_execute($sql);
    }
?>