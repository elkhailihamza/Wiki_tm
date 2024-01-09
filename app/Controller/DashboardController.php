<?php

class DashboardController {

    public function __construct() {
        require __DIR__ . '/../View/dashboard/dashboard_home.view.php';
    }
}

new DashboardController();