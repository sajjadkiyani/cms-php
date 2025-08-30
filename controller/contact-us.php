<?php


use src\Controller;
use src\Template;

class ContactUsController extends Controller{

    public function BeforeRunAction()
    {
        if ($_COOKIE['check_contact_send'] ?? 0 == 1) {
            $template = new Template();
            $template->view("contact-us/message-has-already");
            die();
        } else
            return true ;
    }

    public function showFormAction()
    {
        $template = new Template();
            $template->view("/contact-us/contact-us");

    }

    public function storeFormDataAction(){
        setcookie('check_contact_send',true);
        $template = new Template();
        $template->view("contact-us/contact-us-thank-you");
    }



}
