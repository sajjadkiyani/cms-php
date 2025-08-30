<?php
include("../src/Controller.php");
include("../src/Template.php");

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
}else if($section == "home"){
    include("../controller/home.php");
    $home = new HomeController();
    $home->runAction($action);
}

echo "<h1>index</h1>";