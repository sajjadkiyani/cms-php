<?php

namespace modules\admin\login\controllers;

use src\Auth;
use src\Controller;
use src\Template;
use src\validation\Validation;

class AuthController extends Controller
{


    public function logout()
    {
        $_SESSION['is_admin'] = false;
        header("Location: login");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REQUEST = array_merge($_REQUEST, $_POST);
            $errors = $this->validator($_REQUEST);
            if ($errors) {
                $_SESSION['errors'] = $errors;
                header("Location: login");
            }
            $auth = new Auth();
            $auth->checklogin($_REQUEST['userName'], $_REQUEST['password']);
        }
        $this->LoginForm();
    }

    public function LoginForm()
    {
        $template = new Template();
        $template->view("admin/login/views/login");
    }

    public function validator($request)
    {
        $validate = new Validation();
        $validate->validate($request,[
            'password' => 'required|min:5|max:20',
            'userName' => 'required'
        ]);
        return $validate->errors ;

    }
}