<?php

namespace modules\admin\login\models;

use src\DataBaseConnection;

class Auth
{

    public function checklogin($userName, $password)
    {
//        $password = password_hash($password, PASSWORD_DEFAULT);
        $conn =DataBaseConnection::getConnection();
        $user =new User();
        $user->getBy('user_name',$userName);
        if (property_exists($user,'id')){
            if ($user->user_name == $userName) {
                if (password_verify($password,$user->hashed_password)) {
                    $_SESSION['is_admin'] = true;
                    var_dump("success login");
                }else
                    var_dump("password not match");
            }else
                var_dump("user 1111 not match");
        }else{
            var_dump("user not match");
        }
    }
}