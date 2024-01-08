<?php

namespace app\core;

class Router {
    private static array $routes = [];
    public function __construct() 
    {
        
    }

    public static function get() {
        //router bliz
    }
    public static function post() {
        //router bliz
    }

    public static function abort($code = 404) {
        http_response_code($code);
        include_once __DIR__ . "/../../view/{$code}.view.php";
        die();
    }
}