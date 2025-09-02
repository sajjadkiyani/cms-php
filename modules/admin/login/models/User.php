<?php

namespace modules\admin\login\models;

use src\Entity;

class User extends Entity
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
    }

    protected function setFields()
    {
        $this->fields = array(
            'id',
            'name',
            'user_name',
            'password',
            'hashed_password',
        );
    }
}