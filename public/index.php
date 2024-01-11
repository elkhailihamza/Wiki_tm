<?php

require __DIR__ . "/../vendor/autoload.php";

use core\Database\database;
use core\Routing\Router;
use core\Routing\Application;
use app\Services\sessionManager;

sessionManager::start();

$router = new Router;

$router->get('articles', 'app/Controller/ArticleController/indexController.php');
$router->get('create', 'app/Controller/ArticleController/CreateController.php');

Application::run($router);
