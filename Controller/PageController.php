<?php

namespace Controller;

use model\Page;
use src\Controller;
use src\DataBaseConnection;
use src\Template;

class PageController extends Controller
{


    public function defaultAction()
    {
        $page = new Page();
        $page->getBy('id',$this->entity_id);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("static-page",$data);
    }


}