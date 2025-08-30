<?php
use src\Controller;
use src\Template;

class HomeController extends Controller
{

    public function showAction(){
        $data['title'] = "home";
        $data['content'] = "best code in home page created by sajjad kiyani";
        $template = new Template();
        $template->view("home",$data);
    }

}