<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/InformationController.php';
require_once 'src/controllers/ReceiptController.php';
require_once 'src/controllers/UsersGroupController.php';
require_once 'src/controllers/EventController.php';

class Router {

    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view){
        self::$routes[$url] = $view;
    }

    public static function run ($url) {
        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }
        $query = $_SERVER['REQUEST_URI'];
        if(strpos($query, "?")){
            $query = substr($query, strpos($_SERVER['REQUEST_URI'], '?')+1);
            $query = substr_replace($query, "", -1);

            parse_str($query, $params);

            $controller = self::$routes[$action];
            $object = new $controller;
            $action = $action ?: 'index';

            $object->$action(intval($params['id']));
        }
        else{
            $controller = self::$routes[$action];
            $object = new $controller;
            $action = $action ?: 'index';

            $object->$action();
        }
    }
}