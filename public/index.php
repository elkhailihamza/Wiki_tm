<?php

require __DIR__ . "/../vendor/autoload.php";
use core\Database\database;

use app\Services\sessionManager;
sessionManager::start();

use app\Controller\AuthController;
$test = new AuthController();

use core\Routing\Application;
Application::run();