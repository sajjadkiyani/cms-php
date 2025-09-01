<?php

namespace model;

use PDO;
use src\DataBaseConnection;

class Page
{
    public  $id ;
    public  $title ;
    public  $content ;

    public function getById($id)
    {
       $conn =DataBaseConnection::getConnection();

        $sql = "SELECT * FROM pages WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->content = $row['content'];
    }
}