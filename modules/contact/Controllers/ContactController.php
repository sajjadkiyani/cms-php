<?php
//namespace modules\contact\Controllers ;

use modules\page\models\Page;
use src\Controller;
use src\Template;

class ContactController extends Controller{

    public function BeforeRunAction()
    {
        if ($_COOKIE['check_contact_send'] ?? 0 == 1) {
            $page = new Page();
            $page->getBy('id',2);
            $data['pageObj'] = $page;
            $template = new Template();
            $template->view("contact/views/message-has-already",$data);
            die();
        } else
            return true ;
    }

    public function showFormAction()
    {
        $page = new Page();
        $page->getBy('id',$this->entity_id);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("contact/views/contact-us",$data);

    }

    public function storeFormDataAction(){

        $page = new Page();
        $page->getById(5);
        $data['pageObj'] = $page;
        setcookie('check_contact_send',true);
        $template = new Template();
        $template->view("contact/views/contact-us-thank-you",$data);
    }



}
