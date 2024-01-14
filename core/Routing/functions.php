<?php

namespace core\Routing;

class functions
{
    public static function base_path($path)
    {
        $BASE_PATH = __DIR__ . "/../../";
        return $BASE_PATH . $path;
    }
    public static function authorize($localId, $dbId) {
        return $localId === $dbId ? true : false;
    }
}