<?php

$action = $_GET['action'];

if($action == "about-us"){
    include("../view/about-us.php");
}else if($action == "contact-us"){
    include("../view/contact-us.php");
}else if($action == "home"){
    include("../view/home.php");
}

echo "<h1>index</h1>";