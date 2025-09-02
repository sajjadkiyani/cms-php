<?php

namespace modules\admin\dashboard\controllers;

use modules\admin\login\models\Auth;
use src\Controller;
use src\DataBaseConnection;
use src\Template;

class DashboardController extends Controller
{
    public function beforeRunAction()
    {
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
        if($_SESSION['is_admin'] ?? false) {
            if ($action == 'login')
                header("location: index.php?module=dashboard&action=index");
            return true;
        }
        if($action != 'login') {
            header("location: index.php?module=dashboard&action=login");
        }
    }
    public function indexAction()
    {
           $template = new Template();
           $template->viewModule('admin/dashboard/views/index');
    }

    public function loginAction()
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