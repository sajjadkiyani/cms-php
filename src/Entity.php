<?php

namespace src;

use src\DataBaseConnection;

abstract class Entity
{


    public function __construct()
    {
        $this->setFields();
    }

    abstract protected function setFields();
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

    public function getAll()
    {
        $conn =DataBaseConnection::getConnection();

        $sql = 'SELECT * FROM '.$this->tableName;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $data = [];
        foreach ($rows as $row) {
            $object =new $this();
            $data[] =$this->setValue($row ,$object);
        }
        return $data ;
        !empty($row) ? $this->setValue($row) : print_r("not data");
    }

    public function setValue($row ,$object){
        foreach ($this->fields as $fieldName) {
            $object->$fieldName = $row[$fieldName];
        }
        return $object;
    }
}