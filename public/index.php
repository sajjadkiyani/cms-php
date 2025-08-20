<?php

$section = $_GET['section'] ?? $_POST['section'] ?? null;
$action = $_GET['action'] ?? $_POST['action'] ?? null;
if($section == "about"){
    include("../controller/about-us.php");

}else if($section == "contact"){
    include("../controller/contact-us.php");
    if ($action == 'show'){
        show();
    }elseif ($action == 'store'){
        store();
    }
}else if($section == "home"){
    include("../controller/home.php");
}

echo "<h1>index</h1>";