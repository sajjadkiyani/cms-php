<?php

use modules\page\models\Page;
use src\Controller;
use src\Template;

class HomeController extends Controller
{

    public function showAction(){
        $page = new Page();
        $page->getBy('id',1);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("home",$data);
    }

}