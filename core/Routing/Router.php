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
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);

    }
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);

    }
    public function update($uri, $controller)
    {
        $this->add('UPDATE', $uri, $controller);

    }
    public function resolve()
    {
        $uriParts = explode('/', $this->uri);
        if (isset($uriParts[1]) && $uriParts[1] === 'show') {
            return require functions::base_path('app/Controller/ArticleController/CheckController.php');
        }
        foreach ($this->routes as $route) {
            if ($route['uri'] === $this->uri && $route['method'] === strtoupper($this->method)) {
                return require functions::base_path('app/Controller/' . $route['controller'] . 'Controller.php');
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