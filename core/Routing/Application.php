<?php

namespace core\Routing;
use core\Routing\Router;

class Application {
    public static function run($router) {
        $router->resolve();
    }
}