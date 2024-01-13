<?php
use app\Services\sessionManager;

class LogoutController
{
    public function __construct()
    {
        self::logout();
        header('Location: /wiki_tm/login');
        exit;
    }

    public static function logout()
    {
        return sessionManager::destroy();
    }
}

new LogoutController();