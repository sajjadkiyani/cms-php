<?php

namespace model;

use src\Entity;

class Router extends Entity
{
    public function __construct()
    {
        $this->tableName = "routers";

        $this->fields = [
          'id',
          'module',
          'action',
          'entity_id',
          'url'
        ];
    }

}