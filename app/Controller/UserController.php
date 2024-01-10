<?php

class UserController {

    public function __construct() {
        include __DIR__ . '/../View/create_article.view.php';
    }
}

new UserController();