<?php

namespace src;

class Controller
{

    protected $entity_id ;
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
            include(VIEW_PATH."page-status/404.php");
        }
    }

    public function setEntityId($entity_id)
    {
        $this->entity_id = $entity_id;
    }
}