<?php

namespace core\Routing;
use core\Routing\Request;

class Router {
    protected static array $routes = [];
    public function __construct() 
    {
        
    }
    public static function get($path, $callback) {
        return $routes['GET'][$path] = $callback;
    }
    public static function post($path, $callback) {
        return $routes['POST'][$path] = $callback;
    }
    public static function resolve() {
        $path = Request::getPath();
        $method = Request::getMethod();
        
        include __DIR__ . "/../../app/Controller/ArticleController/CreateController.php";
    }
    public static function abort($code = 404) {
        http_response_code($code);
        include_once __DIR__ . "/../../app/view/{$code}.view.php";
        die();
    }
}