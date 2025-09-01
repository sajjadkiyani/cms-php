<?php

namespace model;

use src\DataBaseConnection;

class Router
{
    public $id ;

    public $module ;

    public $action ;


    public $entity_id ;

    public $url;

    public function getById($id)
    {
        $conn =DataBaseConnection::getConnection();

        $sql = "SELECT * FROM routers WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->module = $row['module'];
        $this->action = $row['action'];
        $this->entity_id = $row['entity_id'];
        $this->url = $row['url'];

    }
}