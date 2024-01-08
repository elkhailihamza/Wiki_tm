<?php

namespace app\core;
use app\core\Router;

class Application {
    public static function run() {
        Router::resolve();
    }
}