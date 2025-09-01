<?php

namespace model;

use src\Entity;

class Router extends Entity
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "routers";
    }

    protected function  setFields()
    {
        $this->fields = [
            'id',
            'module',
            'action',
            'entity_id',
            'url'
        ];
    }

}