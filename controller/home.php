<?php
use src\Controller;
use src\Template;

class HomeController extends Controller
{

    public function showAction(){
        $template = new Template();
        $template->view("home");
    }

}