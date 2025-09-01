<?php

namespace modules\page\models;

use src\Entity;

class Page extends Entity
{

    public function __construct()
    {

        $this->tableName = "pages";

        $this->fields = [
            'id',
            'title',
            'content',
        ];
    }
}