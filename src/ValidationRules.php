<?php

namespace src;

class ValidationRules
{
    public $errors;
    protected $fieldName =null;
    protected $masterRules =array();

    public function __construct(){
        unset($_SESSION['errors']);
        $this->setmMasterRules();
    }


    public function setmMasterRules()
    {
        $this->masterRules = [
            'email' => function ($value) {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$this->fieldName]['email'] = 'Invalid email address';
                        }
            },
            'required' => function ($value) {
                if (empty($value)) {
                    $this->errors[$this->fieldName]['required'] = 'Required field';
                }
            },
            'min:' => function ($value) {
                if (strlen($value) < 2) {
                    $this->errors[$this->fieldName]['min'] = 'Minimum 2 characters';
                }
            }


        ];
    }
}