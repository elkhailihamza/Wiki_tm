<?php

namespace core\Routing;
class Request {
    public static function getPath() {
        return parse_url($_SERVER['REQUEST_URI']);
    }
    public static function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }
}