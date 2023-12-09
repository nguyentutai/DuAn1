<?php 
    function insert_comment($content_comment,$id_product,$id_account){
            $sql = "
                INSERT INTO `comment`(`content_comment`, `id_product`, `id_account`,`date_comment`) 
                VALUES ('$content_comment','$id_product','$id_account',CURDATE());
            ";
            pdo_execute($sql);
    }
    //Load comment theo sản phẩm
    function list_comment_product($id){

 

        $sql = "SELECT comment.id_comment, comment.content_comment,account.id_account,comment.status_comment,account.image_account, 
        account.user,product.id_product, comment.date_comment FROM `comment` 

        JOIN account ON comment.id_account = account.id_account
        JOIN product ON comment.id_product = product.id_product
        WHERE product.id_product = '$id' AND comment.status_comment = '0'";
        return pdo_query($sql);
    }
    //load thùng rác comment
    function listtg_comment_product($id){
        $sql = "SELECT comment.id_comment, comment.content_comment,comment.status_comment, account.user,product.id_product, comment.date_comment FROM `comment` 
        JOIN account ON comment.id_account = account.id_account
        JOIN product ON comment.id_product = product.id_product
        WHERE product.id_product = '$id' AND comment.status_comment = '1'";
        return pdo_query($sql);
    }
    //Ẩn bình luận
    function an_comment_product($id){
        $sql = "UPDATE `comment` SET `status_comment`='1' WHERE `id_comment` = '$id'";
        pdo_execute($sql);
    }
     //Ẩn bình luận
     function kp_comment_product($id){
        $sql = "UPDATE `comment` SET `status_comment`='0' WHERE `id_comment` = '$id'";
        pdo_execute($sql);
    }
    function listblan_comment_product(){
        $sql = "SELECT comment.id_comment, comment.content_comment,comment.status_comment, account.user, comment.date_comment FROM `comment` 
        JOIN account ON comment.id_account = account.id_account
        JOIN product ON comment.id_product = product.id_product
        WHERE comment.status_comment = '1'";
        return pdo_query($sql);
    }
    function delete_comment($id){
        $sql = "DELETE FROM `comment` WHERE id_comment = '$id'";
        pdo_execute($sql);
    }
?>

