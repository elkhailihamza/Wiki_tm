<?php

require __DIR__ . "/../vendor/autoload.php";

use core\Database\database;
use core\Routing\Router;
use core\Routing\Application;
use app\Services\sessionManager;

sessionManager::start();

$router = new Router;

$router->get('login', 'AuthController/Login');
$router->post('login', 'AuthController/Login');
$router->get('register', 'AuthController/Register');
$router->post('register', 'AuthController/Register');
$router->get('/', 'Home');
$router->get('home', 'Home');
$router->get('articles', 'ArticleController/Index');
$router->get('create', 'ArticleController/Create');
$router->get('article', 'ArticleController/Show');

if (sessionManager::get('id_user') === 1) {

}

Application::run($router);
