<?php

require_once __DIR__ . "/../app/database/database.php";

use app\services\sessionManager;
sessionManager::start();

use app\core\Application;

Application::run();