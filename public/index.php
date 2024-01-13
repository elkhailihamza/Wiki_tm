<?php

require __DIR__ . "/../vendor/autoload.php";

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
    $router->post('create', 'ArticleController/Create');
    $router->get('articles/show', 'ArticleController/Check');
    $router->get('categories', 'Categorie');
    $router->get('logout', 'AuthController/Logout');
    $router->post('logout', 'AuthController/Logout');
}

if ((int) sessionManager::get('id_user') === 2) {
    $router->get('dashboard', 'DashboardController/Index');
    $router->get('dashboard/', 'DashboardController/Index');
    $router->get('dashboard/home', 'DashboardController/Index');
    $router->get('dashboard/wiki', 'DashboardController/Show');
}

Application::run($router);
