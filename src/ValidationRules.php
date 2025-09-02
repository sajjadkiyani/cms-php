<?php

namespace src;

class ValidationRules
{
    protected $rules;
    protected $errors;

    protected $masterRules =array();
    public function __construct($rules){
        $this->setmMasterRules();
        $this->masterRules['email'];
        $this->rules = $rules;
    }


    public function setmMasterRules()
    {
        $this->masterRules = [

            'email' => function () {
                        var_dump("test");
            }


        ];
    }
}