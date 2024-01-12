<?php

namespace app\Controller\DashboardController;
use core\Routing\functions;

class IndexController {
    public function __construct() {
        require __DIR__ . "/../../View/dashboard/dashboard_home.view.php";
    }
}

new IndexController();