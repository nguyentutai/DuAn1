<?php 

    function insert_comment($content_comment,$id_product,$id_account,$date_comment){
        $date_comment=date("d/m/Y");
            $sql = "
                INSERT INTO `comment`(`content_comment`, `id_product`, `id_account`,`date_comment`) 
                VALUES ('$content_comment','$id_product','$id_account','$date_comment');
            ";
            pdo_execute($sql);
    }
    function list_comment_product($id){
        $sql = "SELECT comment.id_comment, comment.content_comment,comment.status_comment, account.user,product.id_product, comment.date_comment FROM `comment` 
        JOIN account ON comment.id_account = account.id_account
        JOIN product ON comment.id_product = product.id_product
        WHERE product.id_product = '$id' AND comment.status_comment = '0'";
        return pdo_query($sql);
    }
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
?>

