<?php

namespace app\core;
use app\core\Request;

class Router {
    private static array $routes = [];
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
        
        
    }
    public static function abort($code = 404) {
        http_response_code($code);
        include_once __DIR__ . "/../../view/{$code}.view.php";
        die();
    }
}