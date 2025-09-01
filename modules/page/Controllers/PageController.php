<?php

//namespace modules\page\Controllers;

use src\Controller;
use src\Template;

class PageController extends Controller
{


    public function defaultAction()
    {
        $page = new \modules\page\models\Page();
        $page->getBy('id',$this->entity_id);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("../modules/page/views/static-page",$data);
    }


}