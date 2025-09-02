<?php

namespace modules\admin\login\controllers;

use src\Auth;
use src\Controller;
use src\Template;

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
            $username = $_POST['userName'] ?? '';
            $password = $_POST['password'] ?? '';
            $auth = new Auth();
            $auth->checklogin($username, $password);
        }
        $this->LoginForm();
    }

    public function LoginForm()
    {
        $template = new Template();
        $template->view("admin/login/views/login");
    }
}