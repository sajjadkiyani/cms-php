<?php

namespace modules\page\models;

use src\Entity;

class Page extends Entity
{

    public function  __construct()
    {
        parent::__construct();
        $this->tableName = "pages";
    }

    protected function setFields()
    {
        $this->fields = [
            'id',
            'title',
            'content',
        ];
    }
}