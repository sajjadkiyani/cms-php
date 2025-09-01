<?php

use model\Router;
use modules\page\Controllers\PageController;
use src\DataBaseConnection;

define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR);
define('MODULE_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR);
include(ROOT_PATH."src/Controller.php");
include(ROOT_PATH."src/Template.php");
include(ROOT_PATH."src/Entity.php");
include(ROOT_PATH."model/Router.php");
include(ROOT_PATH."src/DataBaseConnection.php");
include(MODULE_PATH."page/models/Page.php");

DataBaseConnection::getInstance();
DataBaseConnection::connect('localhost','cms_php','root','');
$url = $_GET['seo_name'];
$router = new Router();
$router->getBy('url', $url);
$section = $url;
$action = $router->action;
$moduleName = ucfirst($router->module).'Controller';
$path_Controller = MODULE_PATH.$router->module."/Controllers/".$moduleName.".php" ;
if (file_exists($path_Controller)) {
    include($path_Controller);
    $ControllerObj = new $moduleName();
    $ControllerObj->setEntityId($router->entity_id);
    $ControllerObj->runAction($router->action);
}