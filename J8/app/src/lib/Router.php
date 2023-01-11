<?php

namespace App\Lib\Router;



Class Router
{

    public static function route()
    {
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
        var_dump($controller);
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        var_dump($action);
        $controller = ucfirst($controller);
        $controller = "App\\Controllers\\{$controller}Controller\\{$controller}Controller";
        var_dump(class_exists($controller));
        if (class_exists($controller)) {
            $obj = new $controller();
            if (method_exists($obj, $action)) {
                $obj->$action();
            } else if(method_exists($obj, 'showHome')) {
               $obj->showHome($html = null);
            } else {
                echo "Action index not found";
            }
        } else {
            echo "Controller {$controller} not found";
        }
    }

}