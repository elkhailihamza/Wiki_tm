<?php

use app\Controller\AuthController\IndexController;

class LoginController
{
    public function __construct()
    {
        require __DIR__ . "/../../View/login.view.php";
    }
}

new IndexController;
new LoginController;
