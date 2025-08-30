<?php

namespace src;

class Controller
{
    public function __construct()
    {
        if (method_exists($this, "BeforeRunAction")) {
            $this->BeforeRunAction();
        }
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