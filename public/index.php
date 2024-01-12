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

if (sessionManager::get('id_user') !== NULL) {
    $router->get('/', 'Home');
    $router->get('home', 'Home');
    $router->get('articles', 'ArticleController/Index');
    $router->delete('articles', 'ArticleController/Delete');
    $router->get('create', 'ArticleController/Create');
    $router->get('articles/show', 'ArticleController/Check');
    $router->get('logout', 'AuthController/Logout');
    $router->get('categories', 'Categorie');
}

if (sessionManager::get('id_user') === 2) {
    $router->get('dashboard', function () {
        header('Location: /dashboard/home');
        exit;
    });
    $router->get('dashboard/home', 'DashboardController/Index');
}

Application::run($router);
