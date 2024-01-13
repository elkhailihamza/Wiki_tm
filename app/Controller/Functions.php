<?php

namespace app\Controller;
class Functions {
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function base_path($path)
    {
        $BASE_PATH = __DIR__ . "/../../";
        return $BASE_PATH . $path;
    }
    public static function authorize($localId, $dbId) {
        return $localId === $dbId ? true : false;
    }
}