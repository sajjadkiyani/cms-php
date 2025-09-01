<?php

namespace src;

use src\DataBaseConnection;

class Entity
{
    protected $tableName ;

    protected $fields = array() ;

    public function getBy($filedName, $filedValue)
    {


        $conn =DataBaseConnection::getConnection();

        $sql = 'SELECT * FROM '.$this->tableName.' WHERE '.$filedName.' = :filed';
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('filed' => $filedValue));
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        !empty($row) ? $this->setValue($row) : print_r("not data");

    }

    public function setValue($row){
        foreach ($this->fields as $fieldName) {
            $this->$fieldName = $row[$fieldName];
        }
    }
}