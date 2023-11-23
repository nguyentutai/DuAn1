<?php
    //Hàm insert dữ liệu đănh kí lên database
    function insert_register($username, $password,$image,$email,$phone) {
        $sql = "INSERT INTO `account`(`user`, `pass`, `image_account`, `email_account`, `phone_account`) VALUES ('$username','$password','$image','$email','$phone')";
        pdo_execute($sql);
    }
    //Hàm kiểm tra username người dùng có tồn tại hay không
    function check_register($username) {
        $sql = "SELECT * FROM `account` WHERE `user` = '$username'";
        return pdo_query_one($sql);
    }
    //Kiểm tra đăng nhập
    function check_login($username,$password) {
        $sql = "SELECT * FROM `account` WHERE `user`='$username' AND `pass`='$password'";
        return pdo_query_one($sql);
    }
    //Hiển thị danh sách khách hàng
    function load_kh_account($search){
        $sql = "SELECT * FROM `account` WHERE role <> '1' AND role = '0'";
        if($search != ''){
            $sql .= " AND (user LIKE '%" . $search . "%' OR email_account LIKE '%" . $search . "%')";
        }
        return pdo_query($sql);
    }
    //Hiển thị danh sách nhân viên
    function load_nn_account($search){
        $sql = "SELECT * FROM `account` WHERE role <> '1' AND role = '2'";
        if($search != ''){
            $sql .= " AND (user LIKE '%" . $search . "%' OR email_account LIKE '%" . $search . "%')";
        }
        return pdo_query($sql);
    }
    //Update quyền
    function update_role_account($id,$idupdate){
        $sql = "UPDATE `account` SET `role`='$idupdate' WHERE id_account = $id";
        pdo_execute($sql);
    }
    //Delete khách hàng
    function delete_account($id){  
        $sql = "DELETE FROM `account` WHERE id_account = $id";
        pdo_execute($sql);
    }
    //Hàm hiển thị lỗi cho người dùng
    function is_error($form_err){
        global $error;
        if(!empty($error[$form_err])){
            return $error[$form_err];
        }
    }
?>