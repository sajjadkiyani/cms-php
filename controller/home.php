<?php
use src\Controller;
use model\Page ;
use src\Template;

class HomeController extends Controller
{

    public function showAction(){
        $page = new Page();
        $page->getById(1);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("home",$data);
    }

}