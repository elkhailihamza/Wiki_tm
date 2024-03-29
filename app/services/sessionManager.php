<?php

namespace app\Services;

class sessionManager {
    public static function start() {
        session_start();
    }
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    public static function unset($key) {
        unset($_SESSION[$key]);
    }
    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }
    public static function destroy() {
        session_destroy();
    }
}