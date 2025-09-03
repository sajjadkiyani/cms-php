<?php

namespace src\validation;

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
            $this->checkRuleValue($item,$value);
        }
    }

    public function checkRuleValue($rule,$value)
    {
        if (str_contains($rule, ':')) {
            [$rule ,$param] = explode(':', $rule);
            $methodRule = $this->masterRules[$rule];
            $this->$methodRule($value,$param);
        }else {
            $methodRule = $this->masterRules[$rule];
            $this->$methodRule($value);
        }
    }
}