<?php
use model\Router;
use modules\admin\dashboard\controllers\DashboardController;
use modules\page\Controllers\PageController;
use src\DataBaseConnection;
use src\Route;

SESSION_START();
define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'../view'.DIRECTORY_SEPARATOR);
define('MODULE_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'../modules'.DIRECTORY_SEPARATOR);
define('LOGACTION_PATH',"localhost/cms-php/public/admin/");
include(ROOT_PATH."src/Controller.php");
include(ROOT_PATH."src/Template.php");
include(ROOT_PATH."src/Entity.php");
include(ROOT_PATH."src/Auth.php");
include(ROOT_PATH."src/Route.php");
include(ROOT_PATH."src/validation/ValidationRules.php");
include(ROOT_PATH."src/validation/Validation.php");
include(ROOT_PATH."model/Router.php");
include(ROOT_PATH."src/DataBaseConnection.php");
include(MODULE_PATH."page/models/Page.php");
include(MODULE_PATH."admin/login/models/User.php");
include(MODULE_PATH."admin/dashboard/controllers/DashboardController.php");
include(MODULE_PATH."admin/login/controllers/AuthController.php");

include(ROOT_PATH."route/web.php");

DataBaseConnection::getInstance();
DataBaseConnection::connect('localhost','cms_php','root','');
// start routing by singleton pattern
$route = Route::getInstance();
$route->transformTo($_SERVER['REQUEST_URI']);

//print_r($route->getRoutes());
//
//die();
//$module = $_GET['module'] ?? $_POST['module'] ?? null;
//$action = $_GET['action'] ?? $_POST['action'] ?? null;
//$page =new Validation();
//var_dump(class_exists('Validation'));
//    if ($module == "about-us") {
////        include("../view/about-us.php");
////    } else if ($module == "contact-us") {
////        include("../view/contact-us.php");
////    } else if ($module == "home") {
////        include("../view/home.php");
//    } else if ($module == "dashboard") {
//        $ControllerName = MODULE_PATH . "admin/dashboard/controllers/DashboardController.php";
//        include($ControllerName);
//        $dashboardObj = new DashboardController();
//        $dashboardObj->runAction($action);
//    }else if ($module == "auth") {
//            $ControllerName = ROOT_PATH."src/Auth.php";
//            include_once($ControllerName);
//            $dashboardObj = new \src\Auth();
//            $dashboardObj->runAction($action);
//    } else if ($module == "home") {
//        include("../controller/home.php");
//    }

