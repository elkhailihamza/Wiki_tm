<?php

class UserController {

    public function __construct() {
        include __DIR__ . "/../View/index.view.php";
    }
}

new UserController();