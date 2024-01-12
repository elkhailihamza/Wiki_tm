<?php

namespace app\Controller\DashboardController;
use core\Routing\functions;

class IndexController {
    public function __construct() {
        require functions::base_path('app/View/Dashboard_home.view.php');
    }
}

new IndexController();