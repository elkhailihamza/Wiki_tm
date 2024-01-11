<?php

namespace core\Routing;

use core\Routing\functions;

class Router
{
    protected array $routes = [];
    private $uri;
    private $method;
    public function __construct()
    {
        $this->uri = $_GET['uri'] ?? '/';
        $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }
    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }
    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }
    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }
    public function update($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'UPDATE'
        ];
    }
    public function resolve()
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $this->uri && $route['method'] === strtoupper($this->method)) {
                return require functions::base_path($route['controller']);
            }
        }
        self::abort();
    }
    public static function abort($code = 404)
    {
        http_response_code($code);
        include_once __DIR__ . "/../../app/view/{$code}.view.php";
        die();
    }
}