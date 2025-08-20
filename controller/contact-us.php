<?php


use src\Controller;

class ContactUsController extends Controller{

    public function showFormAction()
    {
        include("../view/contact-us.php");
    }

    public function storeFormDataAction(){
        include("../view/contact-us-thank-you.php");
    }



}
