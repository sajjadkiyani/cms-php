<?php

namespace src;

class Validation extends ValidationRules
{
    public function validate($request ,$rules)
    {
        foreach ($rules as $key=>$rule) {
            $this->fieldName = $key;
            $value = $request[$key];
            $this->checkRulesItem($value,$rule);
        }
    }

    protected function checkRulesItem($value , $rules){
        $rulesItems = explode('|', $rules);
        foreach ($rulesItems as $item) {
            $this->masterRules[$item]($value);
        }
    }
}