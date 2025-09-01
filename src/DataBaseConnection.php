<?php

namespace src;

final class DataBaseConnection
{
    private static $instance = null;
    private static $connection ;

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __construct()
    {
    }

    public static function connect($host,$database , $username, $password){
            self::$connection = new \PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);

    }

    public static function getConnection(){
        return self::$connection;
    }
}