<?php

namespace src;



use modules\page\models\Page;

class Route
{
    protected $routes =array() ;
    private static $instance = null;
    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new Route();
        }
        return self::$instance;
    }

    public function transformTo($url)
    {
        $urlRegulator = $this->urlRegulator($url);
        if (key_exists($urlRegulator, $this->routes)) {
            $this->createObj($urlRegulator);
        }
    }

    public function runAction($classObj,$action ,$data = null)
    {
        $data == null ? $classObj->$action() : $classObj->$action($data);
    }

    public function setRoute($url,$controller,$action,$method = 'get')
    {

        $this->routes += [$url => ['controller'=>$controller, 'action'=>$action] ,$method];
    }

    public function createObj($url)
    {
       $objectName = $this->routes[$url]['controller'];
        $object = new $objectName();
       if (is_object($object)) {
           $this->runAction($object ,$this->routes[$url]['action'] ,$data);
       }
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function urlRegulator($url)
    {
        return str_replace('/cms/cms-php/public/admin/','',$url);
    }

}