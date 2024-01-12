<?php

class HomeController {

    public function __construct() {
        require_once __DIR__ . "/../View/dashboard/dashboard_home.view.php";
    }
}

new HomeController();