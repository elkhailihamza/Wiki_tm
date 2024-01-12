<?php
use app\Services\sessionManager;
class LogoutController {

    public function __construct() {
        if($this->logout()) {
            header('Location: /wiki_tm/login');
            exit;
        }
    }

    public function logout() {
        if(sessionManager::destory()) {
            return true;
        }
    }
}

new LogoutController();