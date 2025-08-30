<?php

namespace model;

use PDO;

class Page
{
    public  $id ;
    public  $title ;
    public  $content ;

    public function getById($id)
    {
        $servername = "localhost";
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $dbname = "cms_php";   // Replace with your database name

        try {
            // Create a new PDO instance
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);

            // Set the PDO error mode to exception for robust error handling
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Disable emulation of prepared statements for better security and performance
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            echo "Connected successfully";
        } catch(PDOException $e) {
            // Catch any PDOException and display the error message
            echo "Connection failed: " . $e->getMessage();
        }

        $sql = "SELECT * FROM pages WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array('id' => $id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->content = $row['content'];
    }
}