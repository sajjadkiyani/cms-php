<?php

namespace src\validation;

class ValidationRules
{
    protected $AllMessages = array();
    public $errors;
    protected $fieldName =null;
    protected $masterRules =array();

    public function __construct(){
        unset($_SESSION['errors']);
        $this->setmMasterRules();
        $this->includeAllMessages();
    }


    public function setmMasterRules()
    {
        $AllMethodClass = get_class_methods($this);
        foreach ($AllMethodClass as $method) {
            if (str_ends_with($method, 'Validate')) {
                $ruleName = substr($method, 0, -8);
                $this->masterRules[$ruleName] = $method;
            }
        }
    }


    public function minValidate($param,$value ='')
    {
        if (strlen($value) < $param) {
            return true;
        }
        return false;
    }
    public function requiredValidate($value = null)
    {
        if (! strlen($value) > 0) {
            return true;
        }
        return false;
    }

    public function maxValidate($param,$value ='')
    {
        if (strlen($value) > intval($param)) {
            return true;
        }
        return false;
    }

    public function setRules(){
        $this->masterRules = array_merge();
    }

    protected function includeAllMessages(){
        $AllMessages = include('ValidationMessage.php');
        $this->AllMessages = $AllMessages;
    }

    public function getMessageError($field){
        return $this->AllMessages[$field];
    }
}