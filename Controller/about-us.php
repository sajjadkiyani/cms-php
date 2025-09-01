<?php

use modules\page\models\Page;
use src\Controller;
use src\Template;

class AboutUsController extends Controller {

    public function showAction()
    {
        $page = new Page();
        $page->getBy( 'id',3);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("static-page",$data);
    }
}