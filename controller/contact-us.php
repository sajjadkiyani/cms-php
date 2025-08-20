<?php

class ContactUsController {

    public function showFormAction()
    {
        include("../view/contact-us.php");
    }

    public function storeFormDataAction(){
        include("../view/contact-us-thank-you.php");
    }

    public function runAction($action){
        $actionName = $action."Action";
        if(method_exists($this, $actionName)){
            $this->$actionName();
        }else {
            include("../view/page-status/404.php");
        }
    }


}
