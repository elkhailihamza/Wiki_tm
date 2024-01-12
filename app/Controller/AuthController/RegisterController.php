<?php
use app\Controller\AuthController\IndexController;
class RegisterController {
    public function __construct() {
        require __DIR__ . "/../../View/register.view.php";
    }
}

new IndexController;
new RegisterController;