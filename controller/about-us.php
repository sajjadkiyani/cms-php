<?php

use model\Page;
use src\Controller;
use src\Template;

class AboutUsController extends Controller {

    public function showAction()
    {
        $page = new Page();
        $page->getById(3);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("about-us",$data);
    }
}