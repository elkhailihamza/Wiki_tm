<?php

namespace core\Routing;

class functions
{
    public static function dd($term)
    {
        echo '<br>';
        var_dump($term);
        echo '<br>';
        die();
    }
    public static function base_path($path)
    {
        $BASE_PATH = __DIR__ . "/../../";
        return $BASE_PATH . $path;
    }
    public static function view($path, $attributes = [])
    {
        extract($attributes);
        require self::base_path('View/' . $path);
    }
}