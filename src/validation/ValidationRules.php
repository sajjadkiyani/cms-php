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


    public function minValidate($value ,$param): void
    {
        if (strlen($value) < $param) {
            $this->errors[$this->fieldName]['min'] = "Minimum {$param} characters";
        }
    }
    public function requiredValidate($value): void
    {
        if (! strlen($value) > 0) {
            var_dump($value);
            var_dump($this->fieldName);
            $this->errors[$this->fieldName]['min'] = "required";
        }
    }

    public function maxValidate($value ,$param): void
    {
        if (strlen($value) > $param) {
            $this->errors[$this->fieldName]['max'] = "maximal {$param} characters";
        }
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