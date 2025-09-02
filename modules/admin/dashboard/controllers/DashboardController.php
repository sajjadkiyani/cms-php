<?php

namespace modules\admin\dashboard\controllers;

use src\Auth;
use src\Controller;
use src\Template;

class DashboardController extends Controller
{
    public function beforeRunAction()
    {
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
        if($_SESSION['is_admin'] ?? false) {
            if ($action == 'login')
                header("location: dashboard");
            return true;
        }
        if($action != 'login') {
            header("location: login");
        }
    }
    public function indexAction()
    {
           $template = new Template();
           $template->viewModule('admin/dashboard/views/index');
    }
    public function index()
    {
        $template = new Template();
        $template->viewModule('admin/dashboard/views/index');
    }


}