<?php

namespace app\Controller\DashboardController;

use core\Routing\ViewRenderer;

class IndexController
{
    public function index()
    {
        ViewRenderer::view("app/View/dashboard/dashboard_wiki.view.php", []);
    }
}

$dashboard = new IndexController();
$dashboard->index();