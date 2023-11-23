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
    function load_all_account($search){
        $sql = "SELECT * FROM `account`";
        if($search != ''){
            $sql .= " WHERE user like '%" . $search . "%' OR email_account like '%".$search."%'";
        }
        
        return pdo_query($sql);
    }
    //Hàm hiển thị lỗi cho người dùng
    function is_error($form_err){
        global $error;
        if(!empty($error[$form_err])){
            return $error[$form_err];
        }
    }
?>