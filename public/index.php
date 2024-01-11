<?php

require __DIR__ . "/../vendor/autoload.php";

use core\Database\database;
use core\Routing\Router;
use core\Routing\Application;
use app\Services\sessionManager;

sessionManager::start();

$router = new Router;

$router->get('/', 'app/Controller/HomeController.php');
$router->get('home', 'app/Controller/HomeController.php');
$router->get('articles', 'app/Controller/ArticleController/IndexController.php');
$router->get('create', 'app/Controller/ArticleController/CreateController.php');
$router->get('login', 'app/Controller/AuthController/LoginController.php');
$router->get('register', 'app/Controller/AuthController/RegisterController.php');

Application::run($router);
