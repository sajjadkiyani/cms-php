<?php

use model\Page;
use src\DataBaseConnection;

define('ROOT_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VIEW_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR);
include(ROOT_PATH."src/Controller.php");
include(ROOT_PATH."src/Template.php");
include(ROOT_PATH."model/Page.php");
include(ROOT_PATH."src/DataBaseConnection.php");

DataBaseConnection::getInstance();
DataBaseConnection::connect('localhost','cms_php','root','');
$section = $_GET['section'] ?? $_POST['section'] ?? null;
$action = $_GET['action'] ?? $_POST['action'] ?? null;
if($section == "about"){
    include("../controller/about-us.php");
    $about = new AboutUsController();
    $about->runAction($action);
}else if($section == "contact"){
    include("../controller/contact-us.php");
    $contact = new ContactUsController();
    $contact->runAction($action);
}else if($section == "home" ){
    include("../controller/home.php");
    $home = new HomeController();
    $home->runAction($action);
}

//echo "<h1>index</h1>";