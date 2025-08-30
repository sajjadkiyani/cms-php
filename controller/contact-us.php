<?php


use src\Controller;
use src\Template;

class ContactUsController extends Controller{

    public function BeforeRunAction()
    {
        if ($_COOKIE['check_contact_send'] ?? 0 == 1) {
            $template = new Template();
            $data['title'] = "message has already";
            $data['content'] = "message has already page ";
            $template->view("contact-us/message-has-already",$data);
            die();
        } else
            return true ;
    }

    public function showFormAction()
    {
        $data['title'] = "Contact Us";
        $data['content'] = "contact-us page ";
        $template = new Template();
        $template->view("contact-us/contact-us",$data);

    }

    public function storeFormDataAction(){

        $data['title'] = "Contact Us thank you";
        $data['content'] = "contact-us thank you page ";
        setcookie('check_contact_send',true);
        $template = new Template();
        $template->view("contact-us/contact-us-thank-you",$data);
    }



}
