<?php


use model\Page;
use src\Controller;
use src\Template;

class ContactUsController extends Controller{

    public function BeforeRunAction()
    {
        if ($_COOKIE['check_contact_send'] ?? 0 == 1) {
            $page = new Page();
            $page->getById(4);
            $data['pageObj'] = $page;
            $template = new Template();
            $template->view("contact-us/message-has-already",$data);
            die();
        } else
            return true ;
    }

    public function showFormAction()
    {
        $page = new Page();
        $page->getById(2);
        $data['pageObj'] = $page;
        $template = new Template();
        $template->view("contact-us/contact-us",$data);

    }

    public function storeFormDataAction(){

        $page = new Page();
        $page->getById(5);
        $data['pageObj'] = $page;
        setcookie('check_contact_send',true);
        $template = new Template();
        $template->view("contact-us/contact-us-thank-you",$data);
    }



}
