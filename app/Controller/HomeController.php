<?php

class HomeController
{
    public function index()
    {
        require_once __DIR__ . "/../View/index.view.php";
    }
}

$home = new HomeController();
$home->index();