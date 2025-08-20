<?php
use src\Controller;

class HomeController extends Controller
{

    public function showAction(){
        include("../view/home.php");
    }

}