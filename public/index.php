<?php

use Controller\ContactController;
use model\Router;
use src\Controller;
use src\DataBaseConnection;
use Controller\PageController;
use src\Template;

define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR);
include(ROOT_PATH."src/Controller.php");
include(ROOT_PATH."src/Template.php");
include(ROOT_PATH."src/Entity.php");
include(ROOT_PATH."model/Page.php");
include(ROOT_PATH."model/Router.php");
include(ROOT_PATH."src/DataBaseConnection.php");

DataBaseConnection::getInstance();
DataBaseConnection::connect('localhost','cms_php','root','');
$url = $_GET['seo_name'];
$router = new Router();
$router->getBy('url', $url);
$section = $url;
$action = $router->action;
$moduleName = ucfirst($router->module).'Controller';
$path_Controller = ROOT_PATH."Controller/".$moduleName.".php" ;
if (file_exists($path_Controller)) {
    include($path_Controller);
    $controllerName = "Controller\\".$moduleName;
    $ControllerObj = new $controllerName();
    $ControllerObj->setEntityId($router->entity_id);
    $ControllerObj->runAction($router->action);
}